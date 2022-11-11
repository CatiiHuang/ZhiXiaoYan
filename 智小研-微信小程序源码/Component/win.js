// Component/win.js

const days = []



for (let i = 6; i <= 23; i++) {
  days.push(i)
}
var app=getApp();
Component({
  /**
   * 组件的属性列表
   */
  properties: {

  },

  /**
   * 组件的初始数据
   */
  data: {
    plus: "/images/index/plus.png",
    dis: "none",
    n: 0.75,
    add:false,//添加框是否显示
    list:false,//下拉列表是否显示,
    bs:"",//开始 结束标识 t 开始 f 结束
    text:"",//新加内容
    start_time:"",
    end_time:"",
    hours: "",//新加对象
    days: days,
    time:6,//时间暂存
    day_list:[],
    mb_day:""
  },

  /**
   * 组件的方法列表
   */
  methods: {
    del_item(e){
      var that = this;
      var index = e.currentTarget.dataset.index;
      var list = this.data.day_list;
      wx.showModal({
        title: '提示',
        content: '确定删除此条目录吗',
        success: function (sm) {
          if (sm.confirm) {
            list.splice(index, 1);
            that.setData({
              day_list:list
            })
            wx.setStorageSync("day_list", list);
          }
        }
      })
      this.setData({
        day_list:list
      })
    },
    add_item(){
      this.setData({
        add: true
      })
    },
    chose_time(e){
      var bs = e.currentTarget.dataset.type;
      var that = this;
      this.setData({
        list: true
      });
      if (bs == "start"){
        that.setData({
          bs:true
        })
      }else{
        that.setData({
          bs: false
        })
      }
     
    },
    bindChange: function (e) {
      var that = this;
      const val = e.detail.value[0];
      var time = val + 6;
      that.setData({
        time:time
      })
      
    },
    formSubmit(e){
      var that = this;
      console.log(e.detail.value);
      var obj = e.detail.value;
      if(that.data.list){
        return false;
      }
      if (!obj.text || !obj.end_time || !obj.start_time){
        wx.showToast({
          title: '内容不完整',
          icon:"loading",
          duration:500
        })
        return false;
      }
      if ((obj.end_time - obj.start_time)<=0){
        wx.showToast({
          title: '时间选择错误',
          icon: "loading",
          duration: 500
        })
        return false;
      }
      var new_obj = {};
      new_obj.text =  obj.text;
      new_obj.time = (obj.start_time+':00-'+obj.end_time+':00');
      new_obj.hours = (obj.end_time - obj.start_time);
      console.log(new_obj);
      var arr = that.data.day_list;
      arr.push(new_obj);
      console.log(arr);
      that.setData({
        day_list:arr,
        bs: "",
        start_time: "",
        end_time: "",
        time: 6,
        list: false,
        add: false
      })
      wx.setStorageSync("day_list", arr);
    },
    cancel(){//弹窗取消
      this.setData({
        bs: "",
        start_time:"",
        end_time:"",
        time:6,
        list: false,
        add:false,
      })
    },
    yes(){//列表确定
      var that =this;
      var bs = that.data.bs;
      var time = that.data.time;
      if (bs==true){
        that.setData({
          bs:"",
          start_time:time,
          list: false
        })
      }else if(bs == false){
        that.setData({
          bs: "",
          end_time: time,
          list:false
        })
      }else{
        that.setData({
          list: false,
          bs:""
        })
      } 
    },
    no(){//列表取消
      this.setData({
        list:false,
        time:10,
        bs:""
      })
    },
    getUserFn() {
      const myEventDetail = {} // detail对象，提供给事件监听函数
      this.triggerEvent("run", myEventDetail)
      //第一个参数，就是给这个事件起个名字，要在组件的bind后面用，第二个参数是传入数据，还有第三个参数冒泡啥的
    },
  
    xz: function () {//旋转方法
      this.setData({
        add:false,
        bs: "",
        start_time: "",
        end_time: "",
        time: 6,
        list:false,
        mb_day: wx.getStorageSync("mb_day")
      })
      this.getUserFn();
      var animation = wx.createAnimation({
        duration: 500,
        timingFunction: 'ease',
      })
    
      this.animation = animation

      // animation.scale(2, 2).rotate(45).step()

      this.setData({
        animationData: animation.export(),
      })
      var i = this.data.n;
      //连续动画需要添加定时器,所传参数每次+1就行

      // animation.translateY(-60).step()
      console.log(i)
      this.animation.rotate(180 * (i)).step()
      this.setData({
        animationData: this.animation.export(),
      })
      if (i == 0.75) {
        this.setData({
          n: -0,
          dis: "block",
          wined:true
        })
      } else {
        this.setData({
          n: 0.75,
          dis: "none",
          wined: false
        })
      }
      var videoCtx = wx.createVideoContext('video', this);
      videoCtx.pause();
    },
    /**/
  },
  lifetimes: {
    attached: function () {
      
      // 在组件实例进入页面节点树时执行
      var that =this;
      console.log("进入组件");
      if (wx.getStorageSync("day_list")){
        that.setData({
          day_list:wx.getStorageSync("day_list")
        })
     }else{
        that.setData({
          day_list: []
        })
     }
    },
    detached: function () {
      // 在组件实例被从页面节点树移除时执行
    },
  },
 
})
