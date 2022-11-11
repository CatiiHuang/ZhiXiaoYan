// pages/my/my_target.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    mb_time:"",//考研时间
    mb_school:"",//目标大学
    mb_majo:"",//目标专业
    _school: "",//跳转选择学习
    _major: "",//跳转选择专业
  },
  choose_school(){
    wx.navigateTo({
      url: '/pages/school_search/school_list/index',
    })
    this.setData({
      _school: ""
    })
  },
  choose_major() {
    wx.navigateTo({
      url: '/pages/major_search/major_list/index',
    })
    this.setData({
      _major: ""
    })
  },
  choose_time(){
    var that = this;
    var arr = ['2019届研考', '2020届研考', '2021届研考'];
    wx.showActionSheet({
      itemList:arr,
      success: function (res) {
        that.setData({
          mb_time:arr[res.tapIndex]
        })
        wx.setStorageSync("mb_time", 2019 + res.tapIndex);
      },
      fail: function (res) {
        console.log("取消选择")
      }
    })
  },
  /**
   * 生命周期函数--监听页面加载
   */

  onLoad: function (options) {
    var that = this;
    /*获取时间*/
    var mb_time = wx.getStorageSync("mb_time") +"届研考";
    if (!wx.getStorageSync("mb_time")){
      mb_time = "2020届研考";
      wx.setStorageSync("mb_time", 2020);
    }
    that.setData({
      mb_time: mb_time
    })
    /*获取时间*/
    //获取学校 专业
    var mb_school = wx.getStorageSync("mb_school");
    var mb_major = wx.getStorageSync("mb_major");
    that.setData({
      mb_school: mb_school,
      mb_major: mb_major
    })
    wx.request({//请求头像
      url: getApp().url()+'/api/wx/getSchoolIMG',
      data:{
        name: mb_school
      },
      success(res){
        console.log(res)
        that.setData({
          mb_school: mb_school,
          mb_school_src:res.data.data[0]
        })
      }
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
    var that = this;
    console.log(that.data._school);
    if (that.data._school){//如果学校更新
      wx.setStorageSync("mb_school", that.data._school);
      that.onLoad();
      that.setData({
        _school:false
      })
    }
    if (that.data._major) {//如果学校更新
      wx.setStorageSync("mb_major", that.data._major);
      that.onLoad();
      that.setData({
        _major: false
      })
    }
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