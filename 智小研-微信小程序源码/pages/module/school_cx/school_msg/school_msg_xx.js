// pages/module/school_msg/schppl_msg_xx.js
const wxCharts = require('../../../../utils/wxcharts.js'); // 引入wx-charts.js文件
Page({

  /**
   * 页面的初始数据
   */
  data: {
    cur_index:0,
    char_lt: "<",
    major:"",
    zybz:"",
    stu:"",
    exam:"",
    yjfx:""
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    console.log(options);
    var major = options.major;
    var arr = major.split("[");
    major = arr[0];
    options.major = major;
    options.num = arr[1];
    this.setData({
      major:major
    })
    this.getYJFX(options);//获取信息
    this.getZYBLB(options);//获取人数
    this.getZYFSX(options)//分数线
    
  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  getYJFX(e){//获取研究方向 考试科目 专业备注
    var that = this;
    wx.request({
      url: getApp().url() +'/api/wx/getYJFX',
      data:{
        xx:e.school,
        zy:e.major
      },
      success(res){
        console.log("研究方向:",res)
          if(res.statusCode==200){
            that.setData({
              zybz: res.data.data.remark,
              yjfx: res.data.data.direction,
              exam: res.data.data.exam
            })
          }else{
            that.setData({
              exam: "暂无详细数据",
              yjfx: ["暂无详细数据"],
              zybz: ["暂无详细数据"]
            })
          }
      }
    })
  },
  getZYFSX(e){//分数线
  var arr = e.num.split("]");
  
    var that = this;
    wx.request({
      url: getApp().url() +'/api/wx/getZYFSX',
      data:{
        xx: e.school,
        zy: arr[0]
      },
      success(res){
        console.log("专业分数线：",res);
        var zf =res.data.data.zf;
        var de =res.data.data.de;
        new wxCharts({
          canvasId: 'lineCanvas1',
          type: 'line',
          categories: ['2018', '2017', '2016', '2015', '2014'],
          series: [{
            name: '历年总分',
            color: "#a63b00",
            data: zf,
            format: function (val) {
              return val;
            }
          }],

          xAxis: {
            title: '小科分',
            format: function (val) {
              return val.toFixed(2);
            },
            min: 0
          },
          width: 310,
          height: 200
        });
        new wxCharts({
          canvasId: 'lineCanvas2',
          type: 'line',
          categories: de,
          series: [{
            name: '历年小科',
            color: "#8a512c",
            data: [75, 80, 68, 70, 70],
            format: function (val) {
              return val;
            }
          }],

          xAxis: {
            title: '分数',
            format: function (val) {
              return val.toFixed(2);
            },
            min: 0
          },
          width: 310,
          height: 200
        });
      }
    })
  },
  getZYBLB(e){//获取录取人数
    var that = this;
    wx.request({
      url: getApp().url() +'/api/wx/getZYBLB',
      data:{
        xx:e.school,
        zy:e.xy
      },
      success(res){
        console.log("专业报录比",res);
        that.setData({
          stu:res.data.data[0].lqrs
        })
      }
    })
  },
  onReady: function () {

  },
  swiper_change: function (e) {
    console.log(e.detail.current)
    this.setData({
      cur_index: e.detail.current
    })
  },
  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function () {

  },
  change_item(e){
    console.log(e.target.dataset.index)
    this.setData({
      cur_index:e.target.dataset.index
    })
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
function biaoge(){
  
}