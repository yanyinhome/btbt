import Vue from 'vue';
import Router from 'vue-router';
import index from '../page/index';
import freshman from '../page/freshman';
import insidePage from '../page/insidePage';
import zhishi from '../page/zhishi';
import C2C from '../page/C2C';
import c2c_gua from '../page/c2c_gua';
import c2c_gua1 from '../page/c2c_gua1';
import jiang from '../page/jiang';
import jiaoyi from '../page/jiaoyi';
import shen from '../page/shen';
import tousu from '../page/tousu';
import lishi from '../page/lishi';
import fei from '../page/fei';
import ba from '../page/ba';
//行情
import hang from '../page1/hang';
import shou from '../page1/shou'
import ming from '../page1/ming';
//财务
import caiwu from '../page2/caiwu'
import shifang from '../page2/shifang'
import yin from '../page2/yin'
import BT from '../page2/BT'
import dui from '../page2/dui'
import mima from '../page2/mima'
import jilu from '../page2/jilu'
import ding from '../page2/ding'
import ding1 from '../page2/ding1'
import ding2 from '../page2/ding2'
import zichan from '../page2/zichan'
import xiang from '../page2/xiang'
import tousu2 from '../page2/tousu2'
import btb from '../page2/btb'
import tibi from '../page2/tibi'
import xiang1 from '../page2/xiang1'
import xiang2 from '../page2/xiang2'
import xiang3 from '../page2/xiang3'
import xiang4 from '../page2/xiang4'
import xiang5 from '../page2/xiang5'
import chong from '../page2/chong'
import waKuang from '../page2/waKuang'
import suoCang from '../page2/suoCang'
import btbPage from '../page2/BTPage'
//账户
import zhanghu from '../page3/zhanghu'
import zhang from '../page3/zhang'
import wo from '../page3/wo'
import yao from '../page3/yao'
import xinxi from '../page3/xinxi'
import shiming from '../page3/shiming'
import anquan from '../page3/anquan'
import yong from '../page3/yong'
import copy from '../page3/copy'
import kefu from '../page3/kefu'
import downs from '../page3/downs'
import wo_yin from '../page3/wo_yin'
import xiugai from '../page3/xiugai'
import sheng from '../page3/sheng'
import youxiang from '../page3/youxiang'
import yonghu from '../page3/yonghu'
import youxiang_xiu from '../page3/youxiang_xiu'
import yanzheng from '../page3/yanzheng'
import fubao from '../page3/fubao'
import she_mima from '../page3/she_mima'
import ren from '../page3/ren'
import xiu_an from '../page3/xiu_an'
import add from '../page3/add'
import xuanze from '../page3/xuanze'
import neiye from '../page3/neiye'
import wai from '../page3/wai'
import haibao from '../page3/haibao'
//联系
// import demo01 from '../lian/demo01'
// import demo02 from '../lian/demo02'
// import demo03 from '../lian/demo03'
//bt矿池
import bt_k from '../page/bt_k'
//交易
import business from '../business/business'
import btb_business from '../business/btb_business'
import btb_tousu from '../business/btb_tousu'
import btb_maichu from '../business/btb_maichu'
import btb_mairu from '../business/btb_mairu'
import btb_shifang from '../business/btb_shifang'
import btb_xu from '../business/btb_xu'
//登录
import login from '../dl/login'
import register from '../dl/register'
import forget from '../dl/forget'
import xieyi from '../dl/xieyi'
Vue.use(Router);
export default new Router({
	mode: 'history',
	base: '/',
	routes: [{
		path: '/index',
		component: index,
		name: 'index'
	},{
		path: '/freshman',
		component: freshman,
		name: 'freshman'
	},
	{
		path: '/fei',
		component: fei,
		name: 'fei'
	},
	{
		path: '/ba',
		component: ba,
		name: 'ba'
	},
	{
		path: '/',
		component: index,
		name: 'index'
	},{
		path: '/haibao',
		component: haibao,
		name: 'haibao'
	},{
		path: '/login',
		component: login,
		name: 'login'
	},{
		path: '/xieyi',
		component: xieyi,
		name: 'xieyi'
	},{
		path: '/register',
		component: register,
		name: 'register'
	},{
		path: '/forget',
		component: forget,
		name: 'forget'
	},{
		path: '/insidePage',
		component: insidePage,
		name: 'insidePage'
	},{
		path: '/zhishi',
		component: zhishi,
		name: 'zhishi'
	},{
		path: '/jiang',
		component: jiang,
		name: 'jiang'
	},{
		path: '/C2C',
		component: C2C,
		name: 'C2C'
	},{
		path: '/c2c_gua',
		component: c2c_gua,
		name: 'c2c_gua'
	},{
		path: '/c2c_gua1',
		component: c2c_gua1,
		name: 'c2c_gua1'
	},{
		path: '/jiaoyi',
		component: jiaoyi,
		name: 'jiaoyi'
	},{
		path: '/shen',
		component: shen,
		name: 'shen'
	},
	{
		path: '/tousu',
		component: tousu,
		name: 'tousu'
	},{
		path: '/lishi',
		component: lishi,
		name: 'lishi'
	},{
		path: '/hang',
		component: hang,
		name: 'hang'
	},{
		path: '/shou',
		component: shou,
		name: 'shou'
	},{
		path: '/ming',
		component: ming,
		name: 'ming'
	},{
		path: '/caiwu',
		component: caiwu,
		name: 'caiwu'
	},{
		path: '/yin',
		component: yin,
		name: 'yin',
		meta: {
            keepAlive: true
        }
	},{
		path: '/BT',
		component: BT,
		name: 'BT'
	},{
		path: '/dui',
		component: dui,
		name: 'dui'
	},{
		path: '/jilu',
		component: jilu,
		name: 'jilu'
	},{
		path: '/mima',
		component: mima,
		name: 'mima',
	
	},{
		path: '/ding',
		component: ding,
		name: 'ding'
	},{
		path: '/ding1',
		component: ding1,
		name: 'ding1'
	},{
		path: '/ding2',
		component: ding2,
		name: 'ding2'
	},{
		path: '/zichan',
		component: zichan,
		name: 'zichan'
	},{
		path: '/xiang',
		component: xiang,
		name: 'xiang',
	},{
		path: '/tousu2',
		component: tousu2,
		name: 'tousu2'
	},{
		path: '/btb',
		component: btb,
		name: 'btb'
	},{
		path: '/tibi',
		component: tibi,
		name: 'tibi'
	},{
		path: '/xiang1',
		component: xiang1,
		name: 'xiang1'
	},{
		path: '/xiang2',
		component: xiang2,
		name: 'xiang2'
	},{
		path: '/xiang3',
		component: xiang3,
		name: 'xiang3'
	},{
		path: '/chong',
		component: chong,
		name: 'chong'
	},{
		path: '/xiang4',
		component: xiang4,
		name: 'xiang4'
	},{
		path: '/xiang5',
		component: xiang5,
		name: 'xiang5'
	},{
		path: '/zhanghu',
		component: zhanghu,
		name: 'zhanghu'
	},{
		path: '/zhang',
		component: zhang,
		name: 'zhang'
	},{
		path: '/wo',
		component: wo,
		name: 'wo'
	},{
		path: '/yao',
		component: yao,
		name: 'yao'
	},{
		path: '/xinxi',
		component: xinxi,
		name: 'xinxi'
	},{
		path: '/shiming',
		component:shiming,
		name: 'shiming'
	},{
		path: '/anquan',
		component:anquan,
		name: 'anquan'
	},{
		path: '/yong',
		component:yong,
		name: 'yong'
	},{
		path: '/copy',
		component:copy,
		name: 'copy'
	},{
		path: '/kefu',
		component:kefu,
		name: 'kefu'
	},{
		path: '/downs',
		component:downs,
		name: 'downs'
	},{
		path: '/wo_yin',
		component:wo_yin,
		name: 'wo_yin'
	},{
		path: '/xiugai',
		component:xiugai,
		name: 'xiugai'
	},{
		path: '/sheng',
		component:sheng,
		name: 'sheng'
	},{
		path: '/youxiang',
		component:youxiang,
		name: 'youxiang'
	},{
		path: '/yonghu',
		component:yonghu,
		name: 'yonghu'
	},{
		path: '/youxiang_xiu',
		component:youxiang_xiu,
		name: 'youxiang_xiu'
	},{
		path: '/yanzheng',
		component:yanzheng,
		name: 'yanzheng'
	},{
		path: '/fubao',
		component:fubao,
		name: 'fubao'
	},{
		path: '/she_mima',
		component:she_mima,
		name: 'she_mima'
	},{
		path: '/ren',
		component:ren,
		name: 'ren'
	},{
		path: '/xiu_an',
		component:xiu_an,
		name: 'xiu_an'
	},{
		path: '/add',
		component:add,
		name: 'add'
	},{
		path: '/xuanze',
		component:xuanze,
		name: 'xuanze'
	},{
		path: '/neiye',
		component:neiye,
		name: 'neiye'
	},{
		path: '/wai',
		component:wai,
		name: 'wai'
	},{
		path: '/shifang',
		component:shifang,
		name: 'shifang'
	},
	// },{
	// 	path: '/demo01',
	// 	component:demo01,
	// 	name: 'demo01'
	// },{
	// 	path: '/demo02',
	// 	component:demo02,
	// 	name: 'demo02'
	// },{
	// 	path: '/demo03',
	// 	component:demo03,
	// 	name: 'demo03'
	// },{
		{
		path: '/waKuang',
		component:waKuang,
		name: 'waKuang'
	},{
		path: '/suoCang',
		component:suoCang,
		name: 'suoCang'
	},{
		path: '/btbPage',
		component:btbPage,
		name: 'btbPage'
	},{
		path: '/bt_k',
		component:bt_k,
		name: 'bt_k'
	},
	{
		path: '/business',
		component:business,
		name: 'business'
	},{
		path: '/btb_business',
		component:btb_business,
		name: 'btb_business'
	},{
		path: '/btb_tousu',
		component:btb_tousu,
		name: 'btb_tousu'
	},{
		path: '/btb_maichu',
		component:btb_maichu,
		name: 'btb_maichu'
	},{
		path: '/btb_mairu',
		component:btb_mairu,
		name: 'btb_mairu'
	},{
		path: '/bt_k',
		component:bt_k,
		name: 'bt_k'
	},{
		path: '/btb_shifang',
		component:btb_shifang,
		name: 'btb_shifang'
	},{
		path: '/btb_xu',
		component:btb_xu,
		name: 'btb_xu'
	},
	],
	scrollBehavior(to, from, savedPosition) {
		if(savedPosition) {
			return savedPosition;
		} else {
			document.scrollingElement.scrollTop = 0;
		}
	}
});