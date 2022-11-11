// pages/module/compare_db/compare_res/compare_res.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    cur_id:0,
    school1:"",
    school2:"",
    major:"",
    obj1:{},
    obj2:{}
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    console.log(options);
    this.getXXDB(options);
    this.setData({
      school1:options.school1,
      school2:options.school2,
      major: options.major
    })
  },
  getXXDB(e){
    var that = this;
    wx.request({
      url: getApp().url() +'/api/wx/getXXDB',
      data:{
        xx1:e.school1,
        xx2:e.school2,
        zy:e.major
      },
      success(res){
        console.log(res)
        that.setData({
          obj1:res.data.data[0],
          obj2:res.data.data[1]
        })
      }
    })
  },
  change_tab(e){
    this.setData({
      cur_id:e.target.dataset.index
    })
  },
  swiper_change(e){
    console.log(e)
    this.setData({
      cur_id: e.detail.current
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