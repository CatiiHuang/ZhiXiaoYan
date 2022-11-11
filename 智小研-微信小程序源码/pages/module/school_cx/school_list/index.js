import { cities } from '../../../../utils/schools.js';
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
                quanpin:item.quanpin,
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
  go_school:function(e){
    console.log(e.currentTarget.dataset)
    wx.navigateTo({
      url: '/pages/module/school_cx/school_msg/school_msg?school=' + e.currentTarget.dataset.name + '&py='+e.currentTarget.dataset.py,
    })
  }
});