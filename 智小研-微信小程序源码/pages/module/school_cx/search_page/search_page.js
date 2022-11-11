// pages/module/search_page/search_page.js
const { $Toast } = require('../../../../dist/base/index');

Page({

  /**
   * 页面的初始数据
   */
  data: {
      list:[
        
      ]
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {

  },
  go_school:function(e){
    console.log(e.target.dataset.school);
    wx.navigateTo({
      url: '/pages/module/school_cx/school_msg/school_msg?school=' + e.target.dataset.school,
    })
  },
  search(e) {
    var that = this;
    that.setData({
      list:[]
    })
    console.log(e.detail.value);
    if (e.detail.value) {
      wx.request({
        url: getApp().url() + '/api/wx/serchSchool',
        data: {
          name: e.detail.value
        },
        success(res) {
          console.log(res)
          if (res.statusCode == 200 && res.data.data.length > 0) {
            that.setData({
              list: res.data.data
            })
          } else {
            $Toast({
              content: '没有相关学校信息'
            });
          }

        }
      })
    }
  },
  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {

  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function () {

  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide: function () {

  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload: function () {

  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh: function () {

  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: function () {

  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {

  }
})