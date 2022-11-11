// pages/login/login.js
const { $Toast } = require('../../dist/base/index');
Page({

  /**
   * 页面的初始数据
   */
  data: {

  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {

  },
  formSubmit(e){
    console.log(e.detail.value);
    var obj = e.detail.value;
    if(!obj.value.school){
      $Toast({
        content: '请填写学校',
        type: 'error'
      });
      return false;
    }
    if (!obj.value.name) {
      $Toast({
        content: '请填写姓名',
        type: 'error'
      });
      return false;
    }
    if (!obj.value.num) {
      $Toast({
        content: '请填写学号',
        type: 'error'
      });
      return false;
    }
    if (!obj.value.cet) {
      $Toast({
        content: '请填写四六级成绩',
        type: 'error'
      });
      return false;
    }
    if (!obj.value.password) {
      $Toast({
        content: '请填写密码',
        type: 'error'
      });
      return false;
    }
    $Toast({
      content: '暂未开放注册功能哦',
      type: 'error'
    });
    
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