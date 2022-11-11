<?php

namespace app\api\controller;

use app\common\controller\Api;
use think\Db;

/**
 * 微信接口
 */
class Wx extends Api
{

    //如果$noNeedLogin为空表示所有接口都需要登录才能请求
    //如果$noNeedRight为空表示所有接口都需要验证权限才能请求
    //如果接口已经设置无需登录,那也就无需鉴权了
    //
    // 无需登录的接口,*表示全部
    protected $noNeedLogin = ['*'];
    // 无需鉴权的接口,*表示全部
    protected $noNeedRight = ['test2'];
    
    
    /**
     * getToTime
     * @param string $year 年
     */
    public function getToTime(){
    	$year = $this->request->request("year");

    	$this->success('返回成功', $this->diffBetweenTwoDays(date("Y-m-d"),"$year-12-21"));
    	
    }
    
    
    public function getPM(){
    	$zy = $this->request->request("zy");
    	$data[0]["name"] = "南京师范大学";
    	$data[0]["pm"] = "94";
    	$data[0]["gxl"] = 73;
    	$data[0]["lql"] = "*";
    	$v = Db::name("blb")->where("xx",$data[0]["name"])->where('yx','like',"%$zy%")->select();
    	$data[0]["blb"] = !empty($v) ? $v[0]["blb"] : '-';
    	
    	$data[1]["name"] = "苏州大学";
    	$data[1]["pm"] = "48";
    	$data[1]["gxl"] = 56;
    	$data[1]["lql"] = 17.3;
    	$v = Db::name("blb")->where("xx",$data[1]["name"])->where('yx','like',"%$zy%")->select();
    	$data[1]["blb"] = !empty($v) ? $v[0]["blb"] : '-';
    	
    	$data[2]["name"] = "重庆大学";
    	$data[2]["pm"] = "23";
    	$data[2]["gxl"] = 21;
    	$data[2]["lql"] = "*";
    	$v = Db::name("blb")->where("xx",$data[2]["name"])->where('yx','like',"%$zy%")->select();
    	$data[2]["blb"] = !empty($v) ? $v[0]["blb"] : '-';
    	
    	$data[3]["name"] = "东华大学";
    	$data[3]["pm"] = "93";
    	$data[3]["gxl"] = 77;
    	$data[3]["lql"] = 39.1;
    	$v = Db::name("blb")->where("xx",$data[3]["name"])->where('yx','like',"%$zy%")->select();
    	$data[3]["blb"] = !empty($v) ? $v[0]["blb"] : '-';
    	
    	$this->success('success',$data);
    }
    
    
    /**
     *getZSJZ
     *@param string $xx 学校
     * 
     */
    public function getZSJZ(){
    	$xx = $this->request->request("xx");
		$dat = Db::name("book2")->where("school",$xx)->select();
		
		$dat = array_unique(explode('|', str_replace("\n","|",$dat[0]["recruit"])));
		$data["title"] = $dat[0];
		$data["nr"] = str_replace("　","",str_replace(" ","",$dat[1]));
		
    	$this->success('success',$data);
    }
    
    /**
     * getZYPM
     * @param string $zy 专业
     * 
     */
    public function getZYPM(){
    	$xx = $this->request->request("zy");
		$dat = Db::name("pm")->where("zy",'like',"%$xx%")->select();
		
		
    	$this->success('success',$dat);
    }
    
    /**
     * getCKSM
     * @param string $xx 学校
     * @param string $zy 专业
     * 
     */
    public function getCKSM(){
    	$xx = $this->request->request("xx");
    	$zy = $this->request->request("zy");
		$dat = Db::name("information")->where('school',$xx)->where("major",'like',"%$zy%")->select();
		
		$dat[0]["direction"] = array_values(array_filter(array_unique(explode("0",$dat[0]["direction"]))));

		
    	$this->success('success',$dat[0]);
    }
    
    /**
     * getYJFX
     * @param string $xx 学校
     * @param string $zy 专业
     * 
     */
    public function getYJFX(){
    	$xx = $this->request->request("xx");
    	$zy = $this->request->request("zy");
		$dat = Db::name("information")->where('school',$xx)->where("major",'like',"%$zy%")->select();
		
		$dat[0]["direction"] = array_values(array_filter(array_unique(explode("0",$dat[0]["direction"]))));

		
		$dat[0]["exam"] = $dat[0]["exam"];
		
    	$this->success('success',$dat[0]);
    }
    
    
    /**
     * getXXJS
      *@param string $xx 学校
     * 
     */
    public function getXXJS(){
    	$xx = $this->request->request("xx");
		$dat = Db::name("xxjs")->where("xx",$xx)->select();

		
    	$this->success('success',$dat);
    }
    
    
    
     /**
     * getZYBLB
     * @param string $xx 学校
     * @param string $zy 专业
     * 
     */
    public function getZYBLB(){
    	$xx = $this->request->request("xx");
    	$zy = mb_substr($this->request->request("zy"),0,2);
		$dat = Db::name("blb")->where("xx",$xx)->where('yx','like',"%$zy%")->select();

		
    	$this->success('success',$dat);
    }
    
    /**
     * getBLB
     * @param string $xx 学校
     * 
     */
    public function getBLB(){
    	$xx = $this->request->request("xx");
		$dat = Db::name("blb")->where("xx",$xx)->select();

		
    	$this->success('success',$dat);
    }
    
    
     /**
     *getURL
     *@param string $zy zy
     */
    public function getURL(){
		$data = Db::name("yzw")->select();
		$i=0;
		$data1 = "";
        foreach ($data as $k=>$v){
            $data1 .= ltrim($v["zy_name"]);
        }
        $arr = null;
        $data1 = explode(",",$data1);
        foreach ($data1 as $k=>$v){
            $arr[$k]["name"] = ltrim($v);
            $arr[$k]["pinyin"] = strtoupper(self::encode(ltrim($v)));
        }

    	//$this->success('success',$arr);
    	
        foreach ($arr as $k=>$v){
			echo "https://baike.baidu.com/item/".$v["name"];
			echo "\n";
        }
    	return;
    }
    
    
    /**
     *getXXZY
     *@param string $xx 学校
     * 
     */
    public function getXXZY(){
    	$xx = $this->request->request("xx");
		$data = Db::name("zy")->where('xx',$xx)->select();
		$i=0;
		$data1;
		foreach ($data as $k=>$v){
			$data[$k] = array_filter($data[$k]);
			unset($data[$k]["zy30"]);
			unset($data[$k]["xx"]);
			unset($data[$k]["id"]);
			$data1[$i]["name"] = $data[$k]["zy1"];
			unset($data[$k]["zy1"]);
			$data1[$i++]["mj"] = array_values($data[$k]);
		}

		
    	$this->success('success',$data1);
    	
    }
    
    
    /**
     * getZYJS
     * @param string $zy 专业
     * 
     */
    public function getZYJS(){
    	$zy = $this->request->request("zy");
    	
    	$data = Db::name("zyjs")->where('zy','like',"%$zy%")->select();
    	
    	$this->success('success',$data[0]["js"].$data[0]["js2"]);
    }
    
    
    /**
     * delxx
     * @param string $zy 专业
     * 
     */
    public function delxx(){
    	//$zy = $this->request->request("zy");
    	
    	$data = Db::name("ky_content")->select();
    	
    	foreach ($data as $k=>$v){
    		$da = Db::name("fsx")->where('xx',$v["school_name"])->select();
    		if(empty($da)){
    			Db::name("ky_content")->where('school_name',$v["school_name"])->delete();
    		}
    	}
    	
    	$this->success('success',$data[0]["js"].$data[0]["js2"]);
    }
    
    
    
    /**
     * getXXDB
     * @param string $xx1 学校1
     * @param string $xx2 学校2
     * @param string $zy 专业
     * 
     */
    public function getXXDB(){
    	$xx1 = $this->request->request("xx1");
    	$xx2 = $this->request->request("xx2");
    	$zy = $this->request->request("zy");
    	
    	$data1 = Db::name("ky_content")->where('school_name',$xx1)->select();
    	$data2 = Db::name("ky_content")->where('school_name',$xx2)->select();
    	
    	$arr[0]["dq"] = $data1[0]["province"];
    	$arr[1]["dq"] = $data2[0]["province"];
    	
    	$arr[0]["sf985"] = $data1[0]["flag_985"] ? "是" : "否";
    	$arr[1]["sf985"] = $data2[0]["flag_985"] ? "是" : "否";
    	
    	$arr[0]["sf211"] = $data1[0]["flag_211"] ? "是" : "否";
    	$arr[1]["sf211"] = $data2[0]["flag_211"] ? "是" : "否";
    	
    	$arr[0]["zzmt"] = $data1[0]["flag_score"];
    	$arr[1]["zzmt"] = $data2[0]["flag_score"];
    	
    	$pm1 = Db::name("xxpm")->where('xx',$xx1)->select();
    	$pm2 = Db::name("xxpm")->where('xx',$xx2)->select();
    	
    	!empty($pm1) ? $arr[0]["pm"] = $pm1[0]["pm"] : $arr[0]["pm"]='-';
    	!empty($pm2) ? $arr[1]["pm"] = $pm2[0]["pm"] : $arr[1]["pm"]='-';
    	
    	$dat = Db::name("information")->where('school',$xx1)->where("major",'like',"%$zy%")->select();
    	if(!empty($dat)){
    
		$arr[0]["direction"] = array_values(array_filter(array_unique(explode("0",$dat[0]["direction"]))));
		$arr[0]["exam"] = $dat[0]["exam"];
    	}else{
			$arr[0]["direction"] = '-';
			$arr[0]["exam"] = '-';
		}
    	
		$dat = Db::name("information")->where('school',$xx2)->where("major",'like',"%$zy%")->select();
		if(!empty($dat)){
		$arr[1]["direction"] = array_values(array_filter(array_unique(explode("0",$dat[0]["direction"]))));
		$arr[1]["exam"] = $dat[0]["exam"];
		}else{
			$arr[1]["direction"] = '-';
			$arr[1]["exam"] = '-';
		}
    	
    	$data1 = Db::name("fsx")->where('xx',$xx1)->select();
    	$data2 = Db::name("fsx")->where('xx',$xx2)->select();
    	
    	$i = 5;
    	
    	$arr[0]["zf"][0] = $data1[$i]["zf"];
		$arr[0]["de"][0] = $data1[$i++]["de100"];
		
		$arr[0]["zf"][1] = $data1[$i]["zf"];
		$arr[0]["de"][1] = $data1[$i++]["de100"];
		
		$arr[0]["zf"][2] = $data1[$i]["zf"];
		$arr[0]["de"][2] = $data1[$i++]["de100"];
		
		$arr[0]["zf"][3] = $data1[$i]["zf"];
		$arr[0]["de"][3] = $data1[$i++]["de100"];
		
		$arr[0]["zf"][4] = $data1[$i]["zf"];
		$arr[0]["de"][4] = $data1[$i++]["de100"];
		
		$i = 5;
    	
    	$arr[1]["zf"][0] = $data2[$i]["zf"];
		$arr[1]["de"][0] = $data2[$i++]["de100"];
		
		$arr[1]["zf"][1] = $data2[$i]["zf"];
		$arr[1]["de"][1] = $data2[$i++]["de100"];
		
		$arr[1]["zf"][2] = $data2[$i]["zf"];
		$arr[1]["de"][2] = $data2[$i++]["de100"];
		
		$arr[1]["zf"][3] = $data2[$i]["zf"];
		$arr[1]["de"][3] = $data2[$i++]["de100"];
		
		$arr[1]["zf"][4] = $data2[$i]["zf"];
		$arr[1]["de"][4] = $data2[$i++]["de100"];
		
		$i=1;
		$pm1 = Db::name("pm")->where('zy','like',"%$zy%")->select();
    	foreach ($pm1 as $f=>$v){
    		if(strpos($v["xx"],$xx1)){
    			$arr[0]["zypm"] = $i;
    			break;
    		} else{
    				$arr[0]["zypm"] = '-';
    		}
    		$i++;
    	}
    	
    	$i=1;
		$pm1 = Db::name("pm")->where('zy','like',"%$zy%")->select();
    	foreach ($pm1 as $f=>$v){
    		if(strpos($v["xx"],$xx2)){
    			$arr[1]["zypm"] = $i;	
    			break;
    		} else{
    				$arr[1]["zypm"] = '-';
    		}
    		$i++;
    	}
    	
    	$this->success('success',$arr);
    }
    
    
    
        
     /**
     * getZYFSX
     * @param string $xx 学校
     * @param string $zy 专业
     * 
     */
    public function getZYFSX(){
    	$xx = $this->request->request("xx");
    	$zy = $this->request->request("zy");
    	
    	$i = substr($zy,-1);
    	
		$data = Db::name("fsx")->where('xx',$xx)->select();
		
		
		$arr["zf"][0] = $data[$i]["zf"];
		$arr["de"][0] = $data[$i++]["de100"];
		
		$arr["zf"][1] = $data[$i]["zf"];
		$arr["de"][1] = $data[$i++]["de100"];
		
		$arr["zf"][2] = $data[$i]["zf"];
		$arr["de"][2] = $data[$i++]["de100"];
		
		$arr["zf"][3] = $data[$i]["zf"];
		$arr["de"][3] = $data[$i++]["de100"];
		
		$arr["zf"][4] = $data[$i]["zf"];
		$arr["de"][4] = $data[$i++]["de100"];
		
		
		
		
    	$this->success('success',$arr);
    	
    }
    
    
    
     /**
     * getFSDX
     * @param string $xx 学校
     * 
     */
    public function getFSX(){
    	$xx = $this->request->request("xx");
		$data = Db::name("fsx")->where('xx',$xx)->select();
		$i=0;
		
		
		
    	$this->success('success',$data);
    	
    }
    
    /**
     *getsearchZY
     *@param string $zy zy
     */
    public function getsearchZY(){
    	$zy = $this->request->request("zy");
		$data = Db::name("yzw")->where('zy_name','like',"%$zy%")->select();
		$i=0;
		$data1 = "";
        foreach ($data as $k=>$v){
            $data1 .= ltrim($v["zy_name"]);
        }
        $arr = null;
        $data1 = explode(",",$data1);
        $i=0;
        foreach ($data1 as $k=>$v){
        	
			if(strpos($v,$zy) !== false){
            $arr[$i]["name"] = ltrim($v);
            $arr[$i++]["pinyin"] = strtoupper(self::encode(ltrim($v)));
            
			}
        }
		if($arr == null){
			$this->success('success',array());
		}
    	$this->success('success',$arr);
    	
    }
    
    /**
     * getZY
     *
     */
    public function getZY(){
    	//$km = $this->request->request("km");
		$data = Db::name("yzw")->select();
		$i=0;
		$data1 = "";
        foreach ($data as $k=>$v){
            $data1 .= ltrim($v["zy_name"]);
        }
        $arr = null;
        $data1 = explode(",",$data1);
        foreach ($data1 as $k=>$v){
            $arr[$k]["name"] = ltrim($v);
            $arr[$k]["pinyin"] = strtoupper(self::encode(ltrim($v)));
        }

    	$this->success('success',$arr);
    	
    }
    
    
    /**
     * getBook
     * @param string $km 科目
     */
    public function getBook(){
    	$km = $this->request->request("km");
		$data = Db::name("book")->where('km','like',"%$km%" )->select();
		$i=0;
        foreach ($data as $k=>$v){
        	$v["tpimage"] = "https://hgqlgzsl.temdu.com/".$data[$k]["tpimage"];
            $data1[$i++] = $v;
        }
		
    	$this->success('success', $data1);
    	
    }
    
    /**
     * getBookURL
     * @param string $id id
     */
    public function getBookURL(){
    	$id = $this->request->request("id");
		$data = Db::name("book")->where('id',$id )->select();
		Db::name("download")->where('id', $id)->setInc('xzcs');
		$i=0;
        foreach ($data as $k=>$v){
        	$data[$k]["tpimage"] = "https://baike.baidu.com/item/".$data[$k]["tpimage"];
        	$data[$k]["updatetime"] = date( "Y-m-d",$data[$k]["updatetime"]);
            $data1[$i++] = $data[$k];
        }
		
    	$this->success('success', $data1);
    }
    
    
    
   /**
     * getDownloadURL
     * @param string $id id
     */
    public function getDownloadURL(){
    	$id = $this->request->request("id");
		$data = Db::name("download")->where('id',$id )->select();
		Db::name("download")->where('id', $id)->setInc('xzcs');
		$i=0;
        foreach ($data as $k=>$v){
        	$data[$k]["ljfile"] = "https://hgqlgzsl.temdu.com/".$data[$k]["ljfile"];
        	$data[$k]["createtime"] = date( "Y-m-d",$data[$k]["createtime"]);
            $data1[$i++] = $data[$k];
        }
		
    	$this->success('success', $data1);
    }
    
    
    /**
     * getDownload
     * @param string $km 科目
     */
    public function getDownload(){
    	$km = $this->request->request("km");
		$data = Db::name("download")->where('kmm','like',"%$km%" )->column('zlm,xzcs,id,xx');
		$i=0;
        foreach ($data as $k=>$v){
            $data1[$i++] = $v;
        }
		
    	$this->success('success', $data1);
    	
    }
    
    /**
     * serchSchool
     * @param string $name 名字
     */
    public function serchSchool(){
    	$name = $this->request->request("name");
    	$data = Db::name("ky_content")->where('school_name','like',"%$name%")->column('school_name,school_code,province');
    	$i=0;
    	$data1 = array();
        foreach ($data as $k=>$v){
            $data[$k]["pinyin"] = strtoupper(self::encode($v["school_name"]));
            $data[$k]["quanpin"] = ucwords(self::encode($v["school_name"],'all'));
            $data[$k]["name"] = $v["school_name"];
            $data1[$i++] = $data[$k];
        }
        $this->success("success",$data1);
    }
    
     /**
     * getSchoolIMG
     * @param string $name 名字
     */
    public function getSchoolIMG(){
    	$name = $this->request->request("name");
    	$data = Db::name("ky_content")->where('school_name',$name)->column('school_logo');

        $this->success("success",$data);
    }
    
    
    /**
     * getSchool
     * 
     */
    public function getSchool(){
    	$data = Db::name("ky_content")->column('school_name,school_code,province');
    	$i=0;
        foreach ($data as $k=>$v){
            $data[$k]["pinyin"] = strtoupper(self::encode($v["school_name"]));
            $data[$k]["quanpin"] = ucwords(self::encode($v["school_name"],'all'));
            $data[$k]["name"] = $v["school_name"];
            $data1[$i++] = $data[$k];
        }
        $this->success("success",$data1);
    }
    
     private static $_aMaps = array(
        'a'=>-20319,'ai'=>-20317,'an'=>-20304,'ang'=>-20295,'ao'=>-20292,
        'ba'=>-20283,'bai'=>-20265,'ban'=>-20257,'bang'=>-20242,'bao'=>-20230,'bei'=>-20051,'ben'=>-20036,'beng'=>-20032,'bi'=>-20026,'bian'=>-20002,'biao'=>-19990,'bie'=>-19986,'bin'=>-19982,'bing'=>-19976,'bo'=>-19805,'bu'=>-19784,
        'ca'=>-19775,'cai'=>-19774,'can'=>-19763,'cang'=>-19756,'cao'=>-19751,'ce'=>-19746,'ceng'=>-19741,'cha'=>-19739,'chai'=>-19728,'chan'=>-19725,'chang'=>-19715,'chao'=>-19540,'che'=>-19531,'chen'=>-19525,'cheng'=>-19515,'chi'=>-19500,'chong'=>-19484,'chou'=>-19479,'chu'=>-19467,'chuai'=>-19289,'chuan'=>-19288,'chuang'=>-19281,'chui'=>-19275,'chun'=>-19270,'chuo'=>-19263,'ci'=>-19261,'cong'=>-19249,'cou'=>-19243,'cu'=>-19242,'cuan'=>-19238,'cui'=>-19235,'cun'=>-19227,'cuo'=>-19224,
        'da'=>-19218,'dai'=>-19212,'dan'=>-19038,'dang'=>-19023,'dao'=>-19018,'de'=>-19006,'deng'=>-19003,'di'=>-18996,'dian'=>-18977,'diao'=>-18961,'die'=>-18952,'ding'=>-18783,'diu'=>-18774,'dong'=>-18773,'dou'=>-18763,'du'=>-18756,'duan'=>-18741,'dui'=>-18735,'dun'=>-18731,'duo'=>-18722,
        'e'=>-18710,'en'=>-18697,'er'=>-18696,
        'fa'=>-18526,'fan'=>-18518,'fang'=>-18501,'fei'=>-18490,'fen'=>-18478,'feng'=>-18463,'fo'=>-18448,'fou'=>-18447,'fu'=>-18446,
        'ga'=>-18239,'gai'=>-18237,'gan'=>-18231,'gang'=>-18220,'gao'=>-18211,'ge'=>-18201,'gei'=>-18184,'gen'=>-18183,'geng'=>-18181,'gong'=>-18012,'gou'=>-17997,'gu'=>-17988,'gua'=>-17970,'guai'=>-17964,'guan'=>-17961,'guang'=>-17950,'gui'=>-17947,'gun'=>-17931,'guo'=>-17928,
        'ha'=>-17922,'hai'=>-17759,'han'=>-17752,'hang'=>-17733,'hao'=>-17730,'he'=>-17721,'hei'=>-17703,'hen'=>-17701,'heng'=>-17697,'hong'=>-17692,'hou'=>-17683,'hu'=>-17676,'hua'=>-17496,'huai'=>-17487,'huan'=>-17482,'huang'=>-17468,'hui'=>-17454,'hun'=>-17433,'huo'=>-17427,
        'ji'=>-17417,'jia'=>-17202,'jian'=>-17185,'jiang'=>-16983,'jiao'=>-16970,'jie'=>-16942,'jin'=>-16915,'jing'=>-16733,'jiong'=>-16708,'jiu'=>-16706,'ju'=>-16689,'juan'=>-16664,'jue'=>-16657,'jun'=>-16647,
        'ka'=>-16474,'kai'=>-16470,'kan'=>-16465,'kang'=>-16459,'kao'=>-16452,'ke'=>-16448,'ken'=>-16433,'keng'=>-16429,'kong'=>-16427,'kou'=>-16423,'ku'=>-16419,'kua'=>-16412,'kuai'=>-16407,'kuan'=>-16403,'kuang'=>-16401,'kui'=>-16393,'kun'=>-16220,'kuo'=>-16216,
        'la'=>-16212,'lai'=>-16205,'lan'=>-16202,'lang'=>-16187,'lao'=>-16180,'le'=>-16171,'lei'=>-16169,'leng'=>-16158,'li'=>-16155,'lia'=>-15959,'lian'=>-15958,'liang'=>-15944,'liao'=>-15933,'lie'=>-15920,'lin'=>-15915,'ling'=>-15903,'liu'=>-15889,'long'=>-15878,'lou'=>-15707,'lu'=>-15701,'lv'=>-15681,'luan'=>-15667,'lue'=>-15661,'lun'=>-15659,'luo'=>-15652,
        'ma'=>-15640,'mai'=>-15631,'man'=>-15625,'mang'=>-15454,'mao'=>-15448,'me'=>-15436,'mei'=>-15435,'men'=>-15419,'meng'=>-15416,'mi'=>-15408,'mian'=>-15394,'miao'=>-15385,'mie'=>-15377,'min'=>-15375,'ming'=>-15369,'miu'=>-15363,'mo'=>-15362,'mou'=>-15183,'mu'=>-15180,
        'na'=>-15165,'nai'=>-15158,'nan'=>-15153,'nang'=>-15150,'nao'=>-15149,'ne'=>-15144,'nei'=>-15143,'nen'=>-15141,'neng'=>-15140,'ni'=>-15139,'nian'=>-15128,'niang'=>-15121,'niao'=>-15119,'nie'=>-15117,'nin'=>-15110,'ning'=>-15109,'niu'=>-14941,'nong'=>-14937,'nu'=>-14933,'nv'=>-14930,'nuan'=>-14929,'nue'=>-14928,'nuo'=>-14926,
        'o'=>-14922,'ou'=>-14921,
        'pa'=>-14914,'pai'=>-14908,'pan'=>-14902,'pang'=>-14894,'pao'=>-14889,'pei'=>-14882,'pen'=>-14873,'peng'=>-14871,'pi'=>-14857,'pian'=>-14678,'piao'=>-14674,'pie'=>-14670,'pin'=>-14668,'ping'=>-14663,'po'=>-14654,'pu'=>-14645,
        'qi'=>-14630,'qia'=>-14594,'qian'=>-14429,'qiang'=>-14407,'qiao'=>-14399,'qie'=>-14384,'qin'=>-14379,'qing'=>-14368,'qiong'=>-14355,'qiu'=>-14353,'qu'=>-14345,'quan'=>-14170,'que'=>-14159,'qun'=>-14151,
        'ran'=>-14149,'rang'=>-14145,'rao'=>-14140,'re'=>-14137,'ren'=>-14135,'reng'=>-14125,'ri'=>-14123,'rong'=>-14122,'rou'=>-14112,'ru'=>-14109,'ruan'=>-14099,'rui'=>-14097,'run'=>-14094,'ruo'=>-14092,
        'sa'=>-14090,'sai'=>-14087,'san'=>-14083,'sang'=>-13917,'sao'=>-13914,'se'=>-13910,'sen'=>-13907,'seng'=>-13906,'sha'=>-13905,'shai'=>-13896,'shan'=>-13894,'shang'=>-13878,'shao'=>-13870,'she'=>-13859,'shen'=>-13847,'sheng'=>-13831,'shi'=>-13658,'shou'=>-13611,'shu'=>-13601,'shua'=>-13406,'shuai'=>-13404,'shuan'=>-13400,'shuang'=>-13398,'shui'=>-13395,'shun'=>-13391,'shuo'=>-13387,'si'=>-13383,'song'=>-13367,'sou'=>-13359,'su'=>-13356,'suan'=>-13343,'sui'=>-13340,'sun'=>-13329,'suo'=>-13326,
        'ta'=>-13318,'tai'=>-13147,'tan'=>-13138,'tang'=>-13120,'tao'=>-13107,'te'=>-13096,'teng'=>-13095,'ti'=>-13091,'tian'=>-13076,'tiao'=>-13068,'tie'=>-13063,'ting'=>-13060,'tong'=>-12888,'tou'=>-12875,'tu'=>-12871,'tuan'=>-12860,'tui'=>-12858,'tun'=>-12852,'tuo'=>-12849,
        'wa'=>-12838,'wai'=>-12831,'wan'=>-12829,'wang'=>-12812,'wei'=>-12802,'wen'=>-12607,'weng'=>-12597,'wo'=>-12594,'wu'=>-12585,
        'xi'=>-12556,'xia'=>-12359,'xian'=>-12346,'xiang'=>-12320,'xiao'=>-12300,'xie'=>-12120,'xin'=>-12099,'xing'=>-12089,'xiong'=>-12074,'xiu'=>-12067,'xu'=>-12058,'xuan'=>-12039,'xue'=>-11867,'xun'=>-11861,
        'ya'=>-11847,'yan'=>-11831,'yang'=>-11798,'yao'=>-11781,'ye'=>-11604,'yi'=>-11589,'yin'=>-11536,'ying'=>-11358,'yo'=>-11340,'yong'=>-11339,'you'=>-11324,'yu'=>-11303,'yuan'=>-11097,'yue'=>-11077,'yun'=>-11067,
        'za'=>-11055,'zai'=>-11052,'zan'=>-11045,'zang'=>-11041,'zao'=>-11038,'ze'=>-11024,'zei'=>-11020,'zen'=>-11019,'zeng'=>-11018,'zha'=>-11014,'zhai'=>-10838,'zhan'=>-10832,'zhang'=>-10815,'zhao'=>-10800,'zhe'=>-10790,'zhen'=>-10780,'zheng'=>-10764,'zhi'=>-10587,'zhong'=>-10544,'zhou'=>-10533,'zhu'=>-10519,'zhua'=>-10331,'zhuai'=>-10329,'zhuan'=>-10328,'zhuang'=>-10322,'zhui'=>-10315,'zhun'=>-10309,'zhuo'=>-10307,'zi'=>-10296,'zong'=>-10281,'zou'=>-10274,'zu'=>-10270,'zuan'=>-10262,'zui'=>-10260,'zun'=>-10256,'zuo'=>-10254
    );

    /**
     * 将中文编码成拼音
     * @param string $utf8Data utf8字符集数据
     * @param string $sRetFormat 返回格式 [head:首字母|all:全拼音]
     * @return string
     */
    public static function encode($utf8Data, $sRetFormat='head'){
        $sGBK = iconv('UTF-8', 'GBK', $utf8Data);
        $aBuf = array();
        for ($i=0, $iLoop=strlen($sGBK); $i<$iLoop; $i++) {
            $iChr = ord($sGBK{$i});
            if ($iChr>160)
                $iChr = ($iChr<<8) + ord($sGBK{++$i}) - 65536;
            if ('head' === $sRetFormat)
                $aBuf[] = substr(self::zh2py($iChr),0,1);
            else
                $aBuf[] = self::zh2py($iChr);
        }
        if ('head' === $sRetFormat)
            return implode('', $aBuf);
        else
            return implode(' ', $aBuf);
    }

    /**
     * 中文转换到拼音(每次处理一个字符)
     * @param number $iWORD 待处理字符双字节
     * @return string 拼音
     */
    private static function zh2py($iWORD) {
        if($iWORD>0 && $iWORD<160 ) {
            return chr($iWORD);
        } elseif ($iWORD<-20319||$iWORD>-10247) {
            return '';
        } else {
            foreach (self::$_aMaps as $py => $code) {
                if($code > $iWORD) break;
                $result = $py;
            }
            return $result;
        }
    }
    
    function diffBetweenTwoDays($day1, $day2)
	{
	  $second1 = strtotime($day1);
	  $second2 = strtotime($day2);
	    
	  if ($second1 < $second2) {
	    $tmp = $second2;
	    $second2 = $second1;
	    $second1 = $tmp;
	  }
	  return ($second1 - $second2) / 86400;
	}
    
}


?>