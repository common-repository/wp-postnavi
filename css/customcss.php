
<!-- CUSTOM FRONT CSS -->

<style type="text/css">
.flotingDiv {
    position: fixed;
    top: 18%;
    width: 80px;
    z-index: 9999;
}
.flotingDiv ul{
    padding: 2px 0;
    width: 100%;
    margin: 0;
    height: 347px;
}

.postnavimob{
    display: none;
}

.post_navi_title{
    float: right;
}
.flotingDiv ul::-webkit-scrollbar-track
{
	border-radius: 10px;
	background-color: transparent;
}

.flotingDiv ul::-webkit-scrollbar
{
	width: 3px;
	background-color: transparent;
}

.flotingDiv ul::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	background-color: transparent;
}
.var_nav{
	position: relative;
    width: 80px;
    height: 35px;
    cursor: pointer;
    top: 0;
    list-style-type: none;
    margin: 0;
    line-height: 1;
}
.post_navi_title{
	background-color: #000;
}
.postss{
    position: relative;
    background-color: #000;
    color: #fff;
    padding: 10px 15px;
    z-index: 1;
}
<?php $pluginOption = get_option("postnavi_option"); if($pluginOption['postnavi_position']=='right'){ ?>

.flotingDiv:hover{width: auto;}
.postul:hover{padding-left: 400px;width: ;}
.post_navi_title{
    float: right;
}
.postul{
    overflow-y: auto;
    overflow-x: hidden; 
}
.var_nav:hover .titlee{
    right: 100%;
    left: auto;
    -webkit-transition:all .5s ease-in-out;
    -moz-transition:all .5s ease-in-out; 
    -o-transition:all .5s ease-in-out; 
    -ms-transition:all .5s ease-in-out;
     transition:all .5s ease-in-out;
}
.titlee{
    position: absolute;
    padding: 10px 0;
    background-color: #000;
    color: #fff; 
    cursor: pointer;
    width: auto;
    overflow: hidden;
    top: 0;
    right: -500%;
    white-space: nowrap;
    -webkit-transition:all .5s ease-in-out;
    -moz-transition:all .5s ease-in-out; 
    -o-transition:all .5s ease-in-out; 
    -ms-transition:all .5s ease-in-out;
     transition:all .5s ease-in-out;
}
<?php } else { ?>
.var_nav:hover .titlee{
    left: 100%;
    right: auto;
    -webkit-transition:all .5s ease-in-out;
    -moz-transition:all .5s ease-in-out; 
    -o-transition:all .5s ease-in-out; 
    -ms-transition:all .5s ease-in-out;
     transition:all .5s ease-in-out;
}
.post_navi_title{
    float: left;
}
.postul{
    overflow: hidden;
}
.var_nav:hover .flotingDiv ul{
	width: 500%;
}
.titlee{
    position: absolute;
    padding: 10px 0;
    background-color: #000;
    color: #fff; 
    cursor: pointer;
    width: auto;
    overflow: hidden;
    top: 0;
    left: -500%;
    white-space: nowrap;
    -webkit-transition:all .5s ease-in-out;
    -moz-transition:all .5s ease-in-out; 
    -o-transition:all .5s ease-in-out; 
    -ms-transition:all .5s ease-in-out;
     transition:all .5s ease-in-out;
}
<?php } ?>
.titlee:hover .titlee a{
    font-weight: bold;
    -webkit-transition:all .5s ease-in-out;
    -moz-transition:all .5s ease-in-out; 
    -o-transition:all .5s ease-in-out; 
    -ms-transition:all .5s ease-in-out;
     transition:all .5s ease-in-out;
}
a.tabber{
	white-space: nowrap;
}
.titlee a{
    text-decoration: none;
    padding: 0 10px;
    color: #fff;
}
.postss a{
    color: #fff;
    text-decoration: none;
}
.postss a:hover{
	font-weight: bold;
	-webkit-transition:all .5s ease-in-out;
    -moz-transition:all .5s ease-in-out; 
    -o-transition:all .5s ease-in-out; 
    -ms-transition:all .5s ease-in-out;
     transition:all .5s ease-in-out;
}
.postup{
	margin-top: 2px;
}
.postdown{
	margin-top: 2px;
}
.postup:hover{
	cursor: pointer;
	font-weight:bold;
    -webkit-transition:all .5s ease-in-out;
    -moz-transition:all .5s ease-in-out; 
    -o-transition:all .5s ease-in-out; 
    -ms-transition:all .5s ease-in-out;
     transition:all .5s ease-in-out;
}
.postdown:hover{
	cursor: pointer;
	font-weight:bold;
    -webkit-transition:all .5s ease-in-out;
    -moz-transition:all .5s ease-in-out; 
    -o-transition:all .5s ease-in-out; 
    -ms-transition:all .5s ease-in-out;
     transition:all .5s ease-in-out;	
}

@media only screen and (max-width: 1030px) { 
    .var_nav {
        height: 36px;
    }
    .postul{
        display: none;
    }
    .post_navi_title{
        cursor: pointer;
    }
    .post_navi_title:hover{
        font-weight: bolder;
        -webkit-transition:all .5s ease-in-out;
        -moz-transition:all .5s ease-in-out; 
        -o-transition:all .5s ease-in-out; 
        -ms-transition:all .5s ease-in-out;
         transition:all .5s ease-in-out;
    }
}
</style>