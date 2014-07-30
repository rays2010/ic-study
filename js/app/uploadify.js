define(["jquery", "jquery.uploadify"], function($){

	/* 变量 */
	var api_url = 'http://u0.topit.me/up2.0.php',
        swf_url = require.toUrl('uploadify.swf'),
		$upload = $('#upload-data'),
		id = $upload.attr('data-id'),
		uid = $upload.attr('data-uid'),
		sid = $upload.attr('data-sid'),
        pids = [],
        aid = null,
        current_album = null
        save_type = 'add';

    get_album_by_uid(uid);

	/* 配置图片上传组件（uploadify.js）*/
	$("#file_upload").uploadify({
        height        : 30,
        buttonClass   : 'btn-upload',
        buttonText 	  : '点击选择图片',
        buttonCursor  : 'hand',
        debug		  : false,
        formData      : {
        	'type' : 'user',
        	'uid'  : uid,
        	'sid'  : sid,
        	'id'   : id
        },
        swf           : swf_url,
        uploader      : api_url,
        width         : 150,
        onUploadSuccess : function(file, data, response) {
            var json = JSON.parse(data);

            pids.push(json.result.pid);

            $wrap = $('#uploaded_img');
            $wrap.parent().show();

            var $new = $('#item_template').clone();
            $new.removeAttr('id').find('.thumb')
            .attr('src', json.result.url).end()
            .find('del').attr('data-pid', json.result.pid);
            $wrap.prepend($new);
            is_can_save();
        }
    });

	/* 图片上传页交互 */

    // 上传到已有专辑或新专辑的tab
	$(".tabs-menu a").click(function(event) {
        // event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("data");
        if(tab == '#tab-add'){
            save_type = 'add';
        } else if (tab == '#tab-new'){
            save_type = 'new';
        }
        $(".tab-content").not(tab).css("display", "none");
        $(tab).show();
        is_can_save();
    });

    // 取用户已有专辑
    function get_album_by_uid(uid){
        $own_album = $('#own_album');
        $.ajax({
              url: api_url,
              jsonp : 'callback',
              data: {
                    albumGet : 1,
                    uid : uid, 
                    page : 1,
                    pagesize : 6
              },
              dataType: 'jsonp',
              success: function(json){
                $.each(json.result, function(index, val) {
                     $li = $("<li>").attr('data-aid', val.aid);
                     $img = $("<img>").attr('src', val.thumb).addClass('thumb');
                     $span = $("<span>").addClass('title').text(val.title);
                     $a = $("<span>").addClass('tip').text('已选择 √');
                     $li.append($img).append($span).append($a);
                     $own_album.append($li);
                });
              }
        });
    }

    // 专辑选择
    $('#own_album').on('click', '#own_album li', function(){
        if(current_album !== null){
            current_album.removeClass('current');
        }
        $(this).addClass('current');
        current_album = $(this);
        aid = $(this).attr('data-aid');

        is_can_save();
    });

    // 删除已上传的图片
    $('#uploaded_img').on('click', '#uploaded_img .del', function(){
        // dom结构
        $(this).parent().remove();

        // 数据
        var dx = pids.getIndexByValue($(this).attr('data-pid'));
        pids.remove(dx); //删除下标为dx的元素

        // 判断
        if(pids.length<1){
            $('#uploaded_img').parent().hide();
            is_can_save();
        }
    })

    $('#save_upload').click(function(event) {
        console.log(pids);
        console.log(aid);
        console.log(save_type);
        console.log($('#album_name').val());
    });

    $('#album_name').keyup(function(){
        is_can_save();
    });

    // 判断当前页面是否可以保存
    function is_can_save(){

        if( save_type == 'new' ){
            if(pids.length < 1 || $('#album_name').val() == ''){
                $('#save_upload').removeClass('btn-finish').addClass('btn-disable');
                return false;
            }
        } else if ( save_type == 'add' ){
            if(pids.length < 1 || aid == null ){
                $('#save_upload').removeClass('btn-finish').addClass('btn-disable');
                return false;
            }
        }
        $('#save_upload').removeClass('btn-disable').addClass('btn-finish');
    }

    // 新建一张空白专辑
    function create_album(uid){

    }

    // 往一个专辑中添加图片
    function save_upload(){

    }

    /* 扩展方法 */
    Array.prototype.remove = function(dx)
    {
        if(isNaN(dx)||dx>this.length){
            return false;
        }
        for(var i=0,n=0;i<this.length;i++)
        {
            if(this[i]!=this[dx])
            {
                this[n++]=this[i];
            }
        }
        this.length-=1;
    }

    Array.prototype.getIndexByValue = function(value)
    {
        var index = -1;
        for (var i = 0; i < this.length; i++)
        {
            if (this[i] == value)
            {
                index = i;
                break;
            }
        }
        return index;
    }

});