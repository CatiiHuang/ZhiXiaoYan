// pages/module/material_ba/book_list/book_xx.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    DownloadURL:"",
    sp_obj:{}
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    var id = options.id;
    var that = this;
    wx.request({
      url: getApp().url()+'/api/wx/getDownloadURL',
      data:{
        id:id
      },
      success(res){
        console.log(res);
        
        that.setData({
          sp_obj: res.data.data[0],
          DownloadURL: res.data.data[0].ljfile
        })
      }
    })
  },
  down(){
    var that = this;
    wx.downloadFile({
      url: that.data.DownloadURL,
      success: function (res) {
        console.log("downloadFile:",res)
        var tempFilePath = res.tempFilePath
        //console.log('临时文件地址是：' + tempFilePath)
        wx.saveFile({
          tempFilePath: tempFilePath,
          success: function (res) {
            console.log("saveFile:", res)
            var saveFilePath = res.savedFilePath;
            wx.openDocument({
              filePath: saveFilePath,
              //就是之前的那个saveFilePath
              success: function (res) {
                console.log(res)
              },
              fail(res){
                console.log("打开失败:", res)
              }
            })
          }//可以将saveFilePath写入到页面数据中
        }) //,
      },
      fail: function (res) {
        wx.showModal({
          title: '下载失败',
          content: '请联系管理员',
        })
      },
      complete: function (res) { },
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