// pages/home/home.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    f:false,
    t:true,
    mb_time:"",//考研时间
    mb_day:"",//剩余时间
    win:true
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    getApp().changeTabBar(); //tabbar
    var that  = this;
    /*考研时间获取*/
    var mb_time = wx.getStorageSync("mb_time");
    if (!mb_time){
      wx.setStorageSync("mb_time",2020);
      mb_time=2020;
    }
    wx.request({
      url: 'https://hgqlgzsl.temdu.com/api/wx/getToTime',
      data: {
        year: mb_time
      },
      success(res) {
        that.setData({
          mb_time:mb_time,
          mb_day:res.data.data
        })
        wx.setStorageSync("mb_day", res.data.data)
      }
    })
    /*考研时间获取*/
  },
  go_url:function(e){
    console.log(e)
    var url = e.currentTarget.dataset.url;
    wx.navigateTo({
      url:url
    })
  },
  test(){
    var that = this;
    setTimeout(()=>{
      that.setData({
        win: !that.data.win
      })
    },700)
    
    console.log(that.data.win)
  },
  turn_tabbar(e) {
    console.log(e)
    if (e.currentTarget.dataset.url =='/pages/my/my'){
      wx.redirectTo({
        url: e.currentTarget.dataset.url,
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