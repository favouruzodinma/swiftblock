 <!-- /.content-wrapper -->
 <footer class="main-footer">
   
    <p class="text-center">Copyright © 2018 - <?php  echo date("Y");  ?> SwiftBlock All Rights Reserved</p>

  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar">
	  
	<div class="rpanel-title"><span class="pull-right btn btn-circle btn-danger"><i class="ion ion-close text-white" data-toggle="control-sidebar"></i></span> </div>  <!-- Create the tabs -->
   
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
          <div class="flexbox">
			<p>NOTIFICATION</p>
		  </div>
		  
          <div class="media-list media-list-hover mt-20">
			   <!-- content  -->
		  </div>

      </div>
    </div>
  </aside>
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
	
	
		
	<!-- <div id="chat-box-body">
		<div id="chat-circle" class="waves-effect waves-circle btn btn-circle btn-lg btn-warning l-h-70">
            <div id="chat-overlay"></div>
            <span class="icon-Group-chat font-size-30"><span class="path1"></span><span class="path2"></span></span>
		</div>

		<div class="chat-box">
            <div class="chat-box-header p-15 d-flex justify-content-between align-items-center">
                <div class="text-center flex-grow-1">
                    <div class="text-dark font-size-18">SwiftBlock</div>
                    <div>
                        <span class="badge badge-sm badge-dot badge-primary"></span>
                        <span class="text-muted font-size-12">Active</span>
                    </div>
                </div>
                <div class="chat-box-toggle">
                    <button id="chat-box-toggle" class="waves-effect waves-circle btn btn-circle btn-danger-light h-40 w-40 rounded-circle l-h-45" type="button">
                      <span class="icon-Close font-size-22"><span class="path1"></span><span class="path2"></span></span>
                    </button>                    
                </div>
            </div>
            <div class="chat-box-body">
                <div class="chat-box-overlay">   
                </div>
                <div class="chat-logs">
                    <div class="chat-msg user">
                        <div class="d-flex align-items-center">
                            <span class="msg-avatar">
                                <img src="../images/avatar/2.jpg" class="avatar avatar-lg">
                            </span>
                            <div class="mx-10">
                                <a href="#" class="text-dark hover-primary font-weight-bold">SwiftBlock</a>
                                <p class="text-muted font-size-12 mb-0">2 Hours</p>
                            </div>
                        </div>
                        <div class="cm-msg-text">
                            Hi there, I'm Jesse and you?
                        </div>
                    </div>
                    <div class="chat-msg self">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="mx-10">
                                <a href="#" class="text-dark hover-primary font-weight-bold">You</a>
                                <p class="text-muted font-size-12 mb-0">3 minutes</p>
                            </div>
                            <span class="msg-avatar">
                                <img src="../images/avatar/3.jpg" class="avatar avatar-lg">
                            </span>
                        </div>
                        <div class="cm-msg-text">
                           My name is Anne Clarc.         
                        </div>        
                    </div>
                    <div class="chat-msg user">
                        <div class="d-flex align-items-center">
                            <span class="msg-avatar">
                                <img src="../images/avatar/2.jpg" class="avatar avatar-lg">
                            </span>
                            <div class="mx-10">
                                <a href="#" class="text-dark hover-primary font-weight-bold">Mayra Sibley</a>
                                <p class="text-muted font-size-12 mb-0">40 seconds</p>
                            </div>
                        </div>
                        <div class="cm-msg-text">
                            Nice to meet you Anne.<br>How can i help you?
                        </div>
                    </div>
                </div>
            </div>
            <div class="chat-input">      
                <form>
                    <input type="text" id="chat-input" placeholder="Send a message..."/>
                    <button type="submit" class="chat-submit" id="chat-submit">
                        <span class="icon-Send font-size-22"></span>
                    </button>
                </form>      
            </div>
		</div>


	</div> -->
	 <!-- recieve modal  -->
    <div class="modal fade" id="recieve">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h4 class="modal-title">RECEIVING COIN</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span></button>
		  </div>
		  <div class="modal-body">
			<!-- <form action="#">
                <select name="" id="" class="form-control" id="exampleFormControlSelect1">
                    <option value="bitcion"><a href="bitcion?recieve">BITCOIN</a></option>
                    <option value="etheruem"><a href="etheruem?recieve">ETHERUEM</a></option>
                    <option value="tron"><a href="tron?recieve">TRON</a></option>
                    <option value="usdt(trc20)"><a href="usdt_erc?recieve">USDT(ERC20)</a></option>
                    <option value="usdt(erc20)"><a href="usdt_trc?recieve">USDT(TRC20)</a></option>
                </select>
            </form> -->
            <a href="bitcoin?recieve" class="btn btn-light"> BITCOIN COIN </a>
            <a href="etheruem?recieve" class="btn btn-light"> ETHERUEN COIN </a>
            <a href="tron?recieve" class="btn btn-light"> TRON COIN </a>
            <a href="usdt_erc?recieve" class="btn btn-light"> USDT(ERC20) COIN </a>
            <a href="usdt_trc?recieve" class="btn btn-light"> USDT(TRC20) COIN </a>
		  </div>
		</div>
		<!-- /.modal-content -->
	  </div>
	  <!-- /.modal-dialog -->
  </div>
 <!-- end of recieve modal  -->

<!-- send modal  -->
<div class="modal fade" id="sendModal">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h4 class="modal-title">SEND COIN</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span></button>
		  </div>
		  <div class="modal-body">
            <a href="send?status=bitcoin" class="btn btn-light"> BITCOIN COIN </a>
            <a href="send?status=etheruem" class="btn btn-light"> ETHERUEN COIN </a>
            <a href="send?status=tron" class="btn btn-light"> TRON COIN </a>
            <a href="send?status=usdt(erc20)" class="btn btn-light"> USDT(ERC20) COIN </a>
            <a href="send?status=usdt(trc20)" class="btn btn-light"> USDT(TRC20) COIN </a>
		  </div>
		</div>
		<!-- /.modal-content -->
	  </div>
	  <!-- /.modal-dialog -->
  </div>
<!-- end of sending modal  -->

	<!-- Page Content overlay -->
	  <!-- Modal -->
  <div class="modal center-modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<center>
			<svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" fill="yellow" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
			<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
			<path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
			</svg>
			<h3>Logging Out.</h3>
			<p>Are you sure?</p>
			</center>
		  </div>
		  <div class="modal-footer modal-footer-uniform">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<a href="logout" class="btn btn-danger float-right">Yes logout</a>
		  </div>
		</div>
	  </div>
	</div>

    

  <!-- /.modal -->
  <script type="text/javascript">
	(function(w,d,v3){
	w.chaportConfig = {
	appId : '654e978bb8b507de5030dd23'
	};

	if(w.chaport)return;v3=w.chaport={};v3._q=[];v3._l={};v3.q=function(){v3._q.push(arguments)};v3.on=function(e,fn){if(!v3._l[e])v3._l[e]=[];v3._l[e].push(fn)};var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://app.chaport.com/javascripts/insert.js';var ss=d.getElementsByTagName('script')[0];ss.parentNode.insertBefore(s,ss)})(window, document);
	</script>