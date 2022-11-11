App({
  tabbar: {
    color: "#5e5653",
    selectedColor: "#5e5653",
    backgroundColor: "#ffffff",
    borderStyle: "#d7d7d7",
    list: [
      {
        pagePath: "/pages/home/home",
        text: "研家",
        iconPath: "/images/index/home.png",
        selectedIconPath: "/images/index/home_act.png",
        selected: true
      },
      {
        pagePath: "/pages/my/my",
        text: "我的",
        iconPath: "/images/index/my.png",
        selectedIconPath: "/images/index/my_act.png ",
        selected: false
      }
    ],
    position: "bottom"
  },
  url(){
    return "https://hgqlgzsl.temdu.com/"
  },
  changeTabBar: function (e) {
    var _curPageArr = getCurrentPages();
    var _curPage = _curPageArr[_curPageArr.length - 1];
    var _pagePath = _curPage.__route__;
    if (_pagePath.indexOf('/') != 0) {
      _pagePath = '/' + _pagePath;
    }
    var tabBar = this.tabbar;
    for (var i = 0; i < tabBar.list.length; i++) {
      // console.log(_pagePath + '--' + tabBar.list[i].pagePath)
      tabBar.list[i].selected = false;
      if (tabBar.list[i].pagePath == _pagePath) {
        tabBar.list[i].selected = true;//根据页面地址设置当前页面状态  
      }
    }
    _curPage.setData({
      tabbar: tabBar
    });
  },
  onLaunch: function () {
    
   if(!wx.getStorageSync("x_bs")){//安排判断
     var list = [
       {text:"记考研单词50个",time:"8:00-9:00",hours:"1"},
       { text: "政治马原框架整理一篇", time: "9:00-10:00", hours: "1" },
       { text: "学习数学", time: "10:00-11:00", hours: "1" },
         { text: "专业课学习", time: "12:00-13:00", hours: "1" }
     ]
    wx.setStorageSync("day_list", list);
    wx.setStorageSync("x_bs", true);
   }//end
   //**判断考研时间，专业，学校  没有就给默认值*/
  var mb_time = wx.getStorageSync("mb_time");
  var mb_major = wx.getStorageSync("mb_major");
  var mb_school = wx.getStorageSync("mb_school");
    if (!mb_time){
      wx.setStorageSync("mb_time",2020)
    }
    if (!mb_school) {
      wx.setStorageSync("mb_school", "重庆大学")
    }
    if (!mb_major) {
      wx.setStorageSync("mb_major", "计算机科学与技术")
    }
    //**判断考研时间，专业，学校  没有就给默认值*/
    if (!wx.getStorageSync("login")) {//登录状态判断
      wx.reLaunch({
        url: '/pages/login/login',
      })
    }
  }
  
})
