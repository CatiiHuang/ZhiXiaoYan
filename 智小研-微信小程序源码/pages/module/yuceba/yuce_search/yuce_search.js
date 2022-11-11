// pages/module/search_page/search_page.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    list: [

    ],
    show_list:false
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {

  },
  go_list(){
    wx.navigateTo({
      url: '../major_list/index',
    })
  },
  change_inp(e){
    var that = this;
    if(!e.detail.value){
      that.setData({
        show_list:false
      })
    }
  },
  go_school(e){//前往详情页
    console.log(e.currentTarget.dataset.name)
    var name;
    wx.navigateTo({
      url: '../yuce_res/yuce_res?major=' + e.currentTarget.dataset.name,
    })
  },
  search_list(e) {
    var that = this;
    if (!e.detail.value) return false;
    wx.request({
      url: getApp().url() + '/api/wx/getsearchZY',
      data: {
        zy: e.detail.value
      },
      success(res) {
        console.log(res)
        
        if (res.statusCode == 200 && res.data.data.length>0) {
          that.setData({
            list: res.data.data,
            show_list:true
          })
        } else {
          wx.showToast({
            title: '没有找到相关专业',
            icon: 'loading'
          })
        }
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