// pages/module/search_page/search_page.js
const { $Toast } = require('../../../dist/base/index');
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
  search(e){
    var that = this;
    console.log(e.detail.value);
    if (e.detail.value){
      wx.request({
        url: getApp().url() +'/api/wx/serchSchool',
        data:{
          name: e.detail.value
        },
        success(res){
          console.log(res)
          if(res.data.data.length>0&&res.statusCode==200){
            that.setData({
              list: res.data.data
            })
          }else{
            $Toast({
              content: '没有相关学校信息'
            });
          }
          
        }
      })
    }
  },
  go_school:function(e){
    console.log(e.target.dataset.school);
    let pages = getCurrentPages();               //当前页面
    let prevPage = pages[pages.length - 3];     //上2页面
    prevPage.setData({                          //直接给上移页面赋值
      _school: e.target.dataset.school,
    });
    wx.navigateBack({
      delta: 2
    })
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