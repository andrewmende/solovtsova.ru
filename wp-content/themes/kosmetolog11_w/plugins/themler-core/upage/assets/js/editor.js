/*global DataUploader, upageEditor */

window.upageEditor = {};
window.upageEditor.uploads = {};
window.upageEditor.idsMap = {};

window.upageEditor.save = function save(saveData, onComplete) {
    'use strict';

    var callback = function(error, hasChanges) {
        upageEditor.hasChanges = !!upageEditor.hasChanges || hasChanges;
        onComplete(error);
    }.bind(this);

    function uploadImages(html, callback) {
        var uploadRequired = {};

        html.replace(/"(data:[^"]*?;base64,[^"]*)"/g, function(match, dataUrl) {
            uploadRequired[dataUrl] = upageEditor.uploads[dataUrl];
            return '';
        }).replace(/(https?:)?\/\/(\S+?)\.(png|jpg|gif|svg|ico|jpeg|bmp)(\?[^"\)\s]*|)/gi, function(url) {
            if (url.indexOf(location.protocol + '//' + location.host) !== 0) {
                uploadRequired[url] = upageEditor.uploads[url];
            }
            return '';
        });

        DataUploader.uploadImages(uploadRequired, function() {
            for(var url in uploadRequired) {
                if (uploadRequired.hasOwnProperty(url) && uploadRequired[url]) {
                    var newUrl = uploadRequired[url].url;
                    html = html.split(url).join(newUrl);

                    upageEditor.uploads[url] = uploadRequired[url];
                    upageEditor.uploads[newUrl] = uploadRequired[url];
                }
            }
            callback(html);
        });
    }

    var sections = $(saveData.html).filter('[data-id]');

    var allHtml = '';
    var ids = saveData.items.map(function(x) { return x.clientId; });
    sections.each(function(i, section) {
        allHtml += section.outerHTML;
    });

    uploadImages(allHtml, function() {
        DataUploader.updatePost({
            id: saveData.id,
            html: allHtml,
            ids: ids
        }, callback);
    });
};

window.upageEditor.saveThumbnail = function saveThumbnail(saveData, callback) {
    'use strict';

    var uploadRequired = {};

    saveData.forEach(function (sectionInfo) {
        uploadRequired[sectionInfo.thumbnailUrl] = {
            isThumbnail: true,
            pageId: sectionInfo.pageId,
            sectionId: sectionInfo.clientId
        };
    });
    DataUploader.uploadImages(uploadRequired, callback);
};