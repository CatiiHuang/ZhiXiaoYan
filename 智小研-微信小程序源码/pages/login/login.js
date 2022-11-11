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
    if(obj.user == "2017211043"&&obj.password=="123456"){
      $Toast({
        content: '登录成功',
        type: 'success'
      });
      wx.setStorageSync("login", true);
      setTimeout(()=>{
        wx.reLaunch({
          url: '/pages/home/home',
        })
      },1500)
      
    }else if(!obj.user){
      $Toast({
        content: '请输入账号',
        type: 'error'
      });
    } 
     else if (!obj.password) {
      $Toast({
        content: '请输入密码',
        type: 'error'
      });
    }
    else if (obj.user.length != 10) {
      $Toast({
        content: '账号格式错误',
        type: 'error'
      });
    }
    else{
      $Toast({
        content: '账号或密码错误',
        type: 'error'
      });
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