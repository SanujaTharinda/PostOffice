






<div id="new-message-box">

    <div id="message-title">
        <div id="new-message-title">
           <label for="">New Message</label> 
    
        </div>
    </div>

    <div id = "message-to">
    <form action="">
        <label id='to'>To</label>
        <input list="browse-users" type="text" id="to-input" oninput="listUsers(this.value)">
        <datalist id="browse-users">
            
                   
        </datalist>

      
    </form>
    
    
    </div>



    <div id="message-body">

    <form action="" id="message-body-form">
        <label >Message</label><br>
        <textarea name=""id="message-body-text-area"></textarea>
    </form>


    </div>


    <div id="message-footer">
            <form >
                <input type="button" value="Send" class="send-button" disabled=true onclick="sendMessageToNewChat()"> 
                <input type="button" value="Cancel" id="cancel-button">
            </form>
                

    </div>
    
</div>























    <div class="chat-container">

        <div class="chat-box">
            

            <div class="middle-box">
                <div class="column-middle-left">
                    <h2 class="chat-heading">Chats</h2>

                    <a class="new-message-anchor"><i id="new-message-icon" class="fas fa-plus-circle"></i></a>



                </div>
                <div class="column-middle-right">
                    <h2>Messages</h2>
                </div>
            </div>


            <div class="message-box" >
                <div class="chats" id="messages-tab">
                    



                </div>

                <div class="messages">
                    <div class="messages-box" id="chat-messages">
                       <h2>No Chat Selected...</h2>

                    </div>

                    <div id="reply-box">
                        <textarea name="" oninput= "checkReplyContent(this.value)" placeholder="Your Message..." id="reply-area"></textarea>



                    </div>
                    <div id="reply-send">
                        <i class="far fa-paper-plane"></i>
                    </div>





                </div>



            </div>







        </div>
    </div>






