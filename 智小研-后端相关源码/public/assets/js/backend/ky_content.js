define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'ky_content/index' + location.search,
                    add_url: 'ky_content/add',
                    edit_url: 'ky_content/edit',
                    del_url: 'ky_content/del',
                    multi_url: 'ky_content/multi',
                    table: 'ky_content',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'school_id',
                sortName: 'school_id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'school_id', title: __('School_id')},
                        {field: 'school_name', title: __('School_name')},
                        {field: 'first_rate', title: __('First_rate')},
                        {field: 'flag_yjxk', title: __('Flag_yjxk')},
                        {field: 'flag_985', title: __('Flag_985')},
                        {field: 'flag_211', title: __('Flag_211')},
                        {field: 'flag_score', title: __('Flag_score')},
                        {field: 'province', title: __('Province')},
                        {field: 'pro_school_type', title: __('Pro_school_type')},
                        {field: 'school_code', title: __('School_code')},
                        {field: 'school_logo', title: __('School_logo')},
                        {field: 'school_introduce', title: __('School_introduce')},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            Controller.api.bindevent();
        },
        edit: function () {
            Controller.api.bindevent();
        },
        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            }
        }
    };
    return Controller;
});