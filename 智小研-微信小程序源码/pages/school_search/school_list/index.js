import { cities } from '../../../utils/schools.js';
Page({
    data : {
        cities : [],
        margin:""
    },
    onChange(event){
        
        
    },
    onReady(){
        let storeCity = new Array(26);
        const words = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"]
        words.forEach((item,index)=>{
            storeCity[index] = {
                key : item,
                list : []
            }
        })
        cities.forEach((item)=>{
            let firstName = item.pinyin.substring(0,1);
            let index = words.indexOf( firstName );
            storeCity[index].list.push({
                name : item.name,
                key : firstName
            });
        })
        this.data.cities = storeCity;
        this.setData({
            cities : this.data.cities
        })
    },
  go_url: function (e) {
    console.log(e)
    var url = e.currentTarget.dataset.url;
    wx.navigateTo({
      url: url
    })
  },
  school_return:function(e){
    console.log(e.currentTarget.dataset.name)
    let pages = getCurrentPages();               //当前页面
    let prevPage = pages[pages.length - 2];     //上2页面
    prevPage.setData({                          //直接给上移页面赋值
      _school: e.currentTarget.dataset.name,
    });
    wx.navigateBack({
      delta: 1
    })
  }
});