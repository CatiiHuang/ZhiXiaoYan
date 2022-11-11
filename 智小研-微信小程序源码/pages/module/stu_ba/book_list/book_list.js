// pages/module/stu_ba/book_list/book_list.js
const { $Toast } = require('../../../../dist/base/index');
Page({

  /**
   * 页面的初始数据
   */
  data: {
    book_list:[
      
    ],
    mb_school:"",
    mb_time:"",
    mb_major:"",
    cur_id:0
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    var mb_major = wx.getStorageSync("mb_major");
    var mb_time = wx.getStorageSync("mb_time");
    var mb_school = wx.getStorageSync("mb_school")
    this.setData({
      mb_major: mb_major,
      mb_time: mb_time,
      mb_school: mb_school
    })
    this.get_list("政治");
  },
  change_tab(e){
    var index = e.target.dataset.index;
    var that = this;
    this.setData({
      cur_id: index
    })
    switch(index){
      case 0:
        that.get_list("政治");
      break;
      case 1:
      that.get_list("英语");
      break;
      case 2:
        that.get_list("数学");
        break;
      case 3:
        that.get_list(that.data.mb_major);
      break;
    }
    
  },
  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  get_list(e){
    console.log(e);
    var that = this;
    wx.request({
      url: getApp().url() +'/api/wx/getBook',
      data:{
        km:e
      },
      success(res){
        console.log(res)
        if (res.statusCode == 200) {
          that.setData({
            book_list: res.data.data
          })
        } else {
          $Toast({
            content: '暂无数据',
            type: 'error'
          });
          that.setData({
            book_list: []
          })
        }
        
      }
    })
  },
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