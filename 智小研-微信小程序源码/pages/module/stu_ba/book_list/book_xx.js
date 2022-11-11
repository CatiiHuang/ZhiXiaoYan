// pages/module/stu_ba/book_list/book_xx.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
   sp_obj:{}
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    var that = this;
    wx.request({
      url: getApp().url() +'/api/wx/getBookURL',
      data:{
        id: options.id
      },
      success(res){
        console.log(res.data.data[0]);
        that.setData({
          lj: res.data.data[0].lj,
          sp_obj: res.data.data[0]
        })
      }
    })
  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {

  },
  copy(){
    var that = this;
    console.log(that.data.lj)
    wx.setClipboardData({
      data: that.data.lj,
      success: function (res) {
        console.log(res)
        
      }
    })
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