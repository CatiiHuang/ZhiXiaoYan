define([], function () {
    require.config({
    paths: {
        'async': '../addons/example/js/async',
        'BMap': ['//api.map.baidu.com/api?v=2.0&ak=mXijumfojHnAaN2VxpBGoqHM'],
    },
    shim: {
        'BMap': {
            deps: ['jquery'],
            exports: 'BMap'
        }
    }
});

require.config({
    paths: {
        'webix': '../libs/webix/codebase/webix',
        'filemanager': '../libs/webix/codebase/filemanager',
    },
    shim: {
        "filemanager": {
            deps: ["webix"],
            exports: "filemanager"
        }
    }
});
});