
Page({

  /**
   * 页面的初始数据 "管理科学与房地产学院": { day: "false", num: 11111, zy: "产业经济学" }
   */
  data: {
    tab: ["学校介绍", "专业目录", "分数线", "招生简章","报录比"],
    current_id:"0",
    fsx_list:[],//分数线
    blb_list: [],//报录比
    zsjz:"",
    school_name:"",//学校名
    school_py:"",//拼音
    xxkk: "",//学校简介
    zy_ml: [
      
      {
        name: "建筑城规学院", majors: [
          { 'day': true, num: "081300", major: "建筑学" },
          { 'day': true, num:"085100", major: "建筑学硕士" },
          { 'day': true, num: "085213", major: "建筑与土木工程" },
          { 'day': true, num: "085300", major: "城市规划硕士" },
          { 'day': true, num: "095300", major: "风景园林硕士硕士" }
        ]
      },
      {
        name: "计算机学院",
         majors: [
          {
            'day': true, num: "081200", major: "计算机科学与技术"
          },
          { 'day': true, num: "085211", major: "计算机技术" }
        ]
      },
      {
        name: "土木工程学院", majors: [
          { 'day': true, num: "081400", major: "土木工程" },
          { 'day': true, num: "082300", major: "交通运输工程" },
          { 'day': true, num: "081600", major: "测绘科学与技术" }
        ]
      },
      {
        name: "数学与统计学院", majors: [
          { 'day': "true", num: "025200", major: "应用统计硕士"},
          { 'day': "false", num: "070100", major: "数学" },
          { 'day': "false", num: "071400", major: "统计学" }
        ]
      },
      {
        name: "艺术学院", majors: [
          { 'day': "true", num: "130400", major: "美术学" },
          { 'day': "false", num: "130200", major: "音乐与舞蹈学" },
          { 'day': "false", num: "130500", major: "设计学]" },
          { 'day': "false", num: "135108", major: "艺术设计" },
          { 'day': "false", num: "135107", major: "美术" },
        
        ]
      },
      {
        name: "机械工程学院", majors: [
          { 'day': "true", num: "130400", major: "美术学" },
          { 'day': "false", num: "130200", major: "音乐与舞蹈学" },
          { 'day': "false", num: "130500", major: "设计学]" },
          { 'day': "false", num: "135108", major: "艺术设计" },
          { 'day': "false", num: "135107", major: "美术" },

        ]
      },
      {
        name: "光电工程学院", majors: [
          { 'day': "true", num: "130400", major: "美术学" },
          { 'day': "false", num: "130200", major: "音乐与舞蹈学" },
          { 'day': "false", num: "130500", major: "设计学]" },
          { 'day': "false", num: "135108", major: "艺术设计" },
          { 'day': "false", num: "135107", major: "美术" },

        ]
      },
      {
        name: "材料科学与工程学院", majors: [
          { 'day': "true", num: "130400", major: "美术学" },
          { 'day': "false", num: "130200", major: "音乐与舞蹈学" },
          { 'day': "false", num: "130500", major: "设计学]" },
          { 'day': "false", num: "135108", major: "艺术设计" },
          { 'day': "false", num: "135107", major: "美术" },

        ]
      },
      
    ]
   
   
    
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    console.log(options.school+options.py);

    var that = this;

    var data = that.data.zy_ml;
    that.setData({
      school_name: options.school,
      school_py: options.py
    })
    
    that.getFSX();//获取分数线
    that.getZSJZ();//获取招生简章
    that.getZYML();//获取专业目录
    that.getBLB();//获取报录比
    that.getXXJJ();//获取学校简介
  },
  getZSJZ() {//获取招生简章
    var that = this;
    wx.request({
      url: getApp().url() + '/api/wx/getZSJZ',
      data: {
        xx: that.data.school_name
      },
      success(res) {
        console.log("学校招生简章:",res);
        that.setData({
          zsjz:res.data.data
        })
      }
    })
  },
  getXXJJ() {//获取学校简介
    var that = this;
    wx.request({
      url: getApp().url() + '/api/wx/getXXJS',
      data: {
        xx: that.data.school_name
      },
      success(res) {
        console.log("学校简介:", res)
        that.setData({
          xxjj: res.data.data[0].js
        })
      }
    })
  },
  getBLB() {//获取报录比
    var that = this;
    wx.request({
      url: getApp().url() + '/api/wx/getBLB',
      data: {
        xx: that.data.school_name
      },
      success(res) {
        console.log("报录比:",res)
        that.setData({
          blb_list: res.data.data
        })
      }
    })
  },
  getZYML(){//获取专业目录
  var that = this;
    wx.request({
      url: getApp().url() + '/api/wx/getXXZY',
      data:{
        xx: that.data.school_name
      },
      success(res){
        // console.log("专业目录:",res)
        that.setData({
          zy_ml:res.data.data
        })
      }
    })
  },
  getFSX(){//获取分数线
    var that = this;
    wx.request({
      url: getApp().url() +'/api/wx/getFSX',
      data:{
        xx:that.data.school_name
      },
      success(res){
        // console.log("学校分数线:",res);
        that.setData({
          fsx_list:res.data.data
        })
      }
    })
  },
  change:function(e){
    this.setData({
      current_id: e.target.dataset.index
    })
  },
  swiper_change:function(e){
    console.log(e.detail.current)
    this.setData({
      current_id: e.detail.current
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