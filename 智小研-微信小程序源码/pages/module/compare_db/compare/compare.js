// pages/module/compare_db/compage/compare.js
const { $Toast } = require('../../../../dist/base/index');
Page({

  /**
   * 页面的初始数据
   */
  data: {
    _school:"",
    _index:"",
    _major:"",
    db_major:"",
    
    school:[
      
    ]
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    var that= this;
    if (!wx.getStorageSync("db_school")) {//读学校缓存
      console.log(" 无对比 学校缓存")
      that.setData({
        school: [{ name: "", src: "" }, { name: "", src: "" }],
      })
    }else{
      console.log(" 有对比 学校缓存")
      that.setData({
         school: wx.getStorageSync("db_school")
      })
    }
    console.log(!wx.getStorageSync("db_major"));
    if (!wx.getStorageSync("db_major")) {//读专业缓存
      that.setData({
        db_major:"请选择专业"
      })
    } else {
      that.setData({
        db_major: wx.getStorageSync("db_major")
      })
    }
  
  },
  go_res(){
    var that = this;
    if(!that.data.db_major){
      $Toast({
        content: '未选择专业',
        type: 'error'
      });
      return false;
    }
    if (!that.data.school[0].name || !that.data.school[1].name){
      $Toast({
        content: '未选择学校',
        type: 'error'
      });
        
      return false;
    }

    wx.navigateTo({
      url: '../compare_res/compare_res?major=' + that.data.db_major + '&school1=' + that.data.school[0].name+'&school2=' + that.data.school[1].name,
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
  add_school(e){
    var that = this;
    var index = e.currentTarget.dataset.index;
   
    if ( !that.data.school[index].name ){
      that.setData({
        _index: index,
      })
      wx.navigateTo({
        url: '/pages/school_search/school_list/index',
      })
    }else{
      console.log(that.data.school[index].name)
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
    var that = this;
    console.log("onshow_学校：",that.data._school);
    if (that.data._school && that.data._index){
      console.log("_show设置缓存")
      that.get_src();//获取头像并存储
    }
    console.log("onshow_专业：", that.data._school);
    if (that.data._major) {
      console.log("_show设置缓存")
      wx.setStorageSync("db_major", that.data._major);
      that.setData({
        db_major: that.data._major
      })
    }

  },
  get_src(){
    var that = this;
    var new_obj = that.data.school;
    new_obj[that.data._index].name = that.data._school;
    
    wx.request({
      url: getApp().url() + '/api/wx/getSchoolIMG',
      data: {
        name: that.data._school
      },
      success(res) {
        new_obj[that.data._index].src = res.data.data[0];//通过请求设置头像
        that.setData({
          school: new_obj
        })
        wx.setStorageSync("db_school", new_obj);
      }
    })
    
    
;
  },
  del(e){
    console.log(e)
    var index = e.currentTarget.dataset.index;
    var new_obj = this.data.school;
    new_obj[index]={name:"",src:""}
    this.setData({
      school:new_obj
    })
    wx.setStorageSync("db_school", new_obj);
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

  },
})