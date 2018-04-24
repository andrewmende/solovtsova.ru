/*exported DataUploader */
/*global UPageUtility, upageSettings, async */

var DataUploader = (function() {
    'use strict';

    function updatePost(postData, callback) {
        doRequest(upageSettings.actions.updatePost, postData, callback);
    }

    function uploadImage(imageData, callback) {

        var mimeType = imageData.mimeType;
        var fileName = imageData.fileName;
        var uInt8Array;

        if (imageData.data instanceof Uint8Array) {
            uInt8Array = imageData.data;
            upload();
            return;

        }

        if (UPageUtility.isBase64String(imageData.data)) {
            var parts = imageData.data.split(';base64,');
            mimeType = parts[0].split(':')[1];
            var raw = window.atob(parts[1]);
            var rawLength = raw.length;

            uInt8Array = new Uint8Array(rawLength);

            for (var i = 0; i < rawLength; i++) {
                uInt8Array[i] = raw.charCodeAt(i);
            }
            upload();
            return;
        }

        UPageUtility.downloadByteArrayInline(imageData.data, false, 1, function(error, array) {
            if (error) {
                callback(error);
                return;
            }
            uInt8Array = array;
            upload();
        });

        function upload() {
            var uploader = new ImageUploader(uInt8Array, $.extend(true, {
                url: upageSettings.actions.uploadImage,
                type: mimeType,
                fileName: fileName,
                params: imageData.params
            }, upageSettings.uploadImageOptions), callback);
            uploader.upload();
        }
    }

    function uploadImages(urlsMap, callback) {

        var urls = Object.keys(urlsMap);

        async.forEach(urls, function (url, forEachCb) {
            if (urlsMap[url] && urlsMap[url].url) {
                // already uploaded early
                forEachCb();
                return;
            }
            DataUploader.uploadImage({
                fileName: 'image.png',
                params: urlsMap[url],
                data: url
            }, function(error, data) {
                if (error) {
                    // show error and continue uploading
                    UPageUtility.showError(error);
                } else {
                    urlsMap[url] = {
                        url: data.image_url,
                        mediaId: data.upload_id
                    };
                }
                forEachCb();
            });
        }, function (error) {
            callback(error);
        });
    }

    function uploadSections(sections, callback) {
        if (sections.length === 0) {
            callback();
            return;
        }
        doRequest(upageSettings.actions.uploadSections, {
            sections: sections
        }, callback);
    }

    function getSite(callback) {
        doRequest(upageSettings.actions.getSite, {}, callback);
    }

    function getPage(pageId, callback) {
        doRequest(upageSettings.actions.getPage, {pageId: pageId}, callback);
    }

    function duplicatePage(pageId, callback) {
        doRequest(upageSettings.actions.duplicatePage, {pageId: pageId}, callback);
    }

    function updatePages(data, callback) {
        doRequest(upageSettings.actions.updatePages, {data: data}, callback);
    }

    function updatePageSections(data, callback) {
        doRequest(upageSettings.actions.updatePageSections, {data: data}, callback);
    }

    function doRequest(url, data, onError, onSuccess) {
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: $.extend(true, {}, upageSettings.ajaxData, data)
        }).done(function requestSuccess(response, status, xhr) {
            if (response.result === 'done') {
                if (typeof onSuccess === 'undefined') {
                    onError(null, response);
                } else {
                    onSuccess(response);
                }
                return;
            }
            onError(UPageUtility.createError(xhr));
        }).fail(function requestFail(xhr) {
            onError(UPageUtility.createError(xhr));
        });
    }

    return {
        updatePost: updatePost,
        uploadImage: uploadImage,
        uploadImages: uploadImages,
        uploadSections: uploadSections,
        getSite: getSite,
        getPage: getPage,
        duplicatePage: duplicatePage,
        updatePages: updatePages,
        updatePageSections: updatePageSections
    };
})();

function ImageUploader(byteArray, options, callback) {
    'use strict';

    var type = options.type || '';
    var file = new Blob([byteArray], { type: type });

    this.upload = function upload() {

        setTimeout(function () {
            var formData = new FormData();
            formData.append(options.formFileName, file, options.fileName);

            var params = options.params;
            if (typeof params === 'object') {
                for (var i in params) {
                    if (params.hasOwnProperty(i)) {
                        formData.append(i, params[i]);
                    }
                }
            }

            return $.ajax({
                url: options.url,
                data: formData,
                type: 'POST',
                mimeType: 'application/octet-stream',
                processData: false,
                contentType: false,
                headers: {},
                success: function(responce, status, xhr) {
                    var result;
                    try {
                        result = JSON.parse(responce);
                    } catch(e) {
                        callback(UPageUtility.createError(xhr));
                        return;
                    }
                    callback(null, result);
                }
            });

        }, 0);
    };
}