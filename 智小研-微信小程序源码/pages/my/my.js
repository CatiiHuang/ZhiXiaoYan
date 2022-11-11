// pages/my/my.js
const { $Toast } = require('../../dist/base/index');
Page({

  /**
   * 页面的初始数据
   */
  data: {
    "win": "/Component/win"
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    getApp().changeTabBar(); 
  },
  handleChange({ detail }) {
    this.setData({
      current: detail.key
    });
    if (detail.key=="homepage"){
      wx.switchTab({
        url: "/pages/home/home"
      })
    }
    
  },
  plus(){
    this.selectComponent("#win").xz();
  },
  go_url(e){
    wx.navigateTo({
      url: e.currentTarget.dataset.url,
    })
  },
  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  more(){
    $Toast({
      content: '功能正在开发完善中~',
      icon: 'emoji'
    });
  },
  onReady: function () {

  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function () {

  },
  login_out(){
    wx.showModal({
    title: '提示',
    content:'确定要退出吗？',
    success(res) {
      if (res.confirm) {
        wx.setStorageSync("login", false);
        wx.reLaunch({
          url: '/pages/login/login',
        })
      } else if (res.cancel) {
        console.log('用户点击取消')
      }
    }
    })
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
  turn_tabbar(e) {
    console.log(e)
    if (e.currentTarget.dataset.url !== '/pages/my/my') {
      wx.redirectTo({
        url: e.currentTarget.dataset.url,
      })
    }
  },
  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {

  }
})