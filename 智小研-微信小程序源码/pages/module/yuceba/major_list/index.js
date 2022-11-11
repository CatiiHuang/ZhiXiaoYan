import { cities } from '../../../../utils/majors.js';
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
   wx.navigateBack({});
  },
  go_school:function(e){
    console.log(e.currentTarget.dataset.name);
    wx.navigateTo({
      url: '../yuce_res/yuce_res?major=' + e.currentTarget.dataset.name,
    })
  }
});