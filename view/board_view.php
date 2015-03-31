<h1><i class="fa fa-home"></i> Board</h1>

<div style="margin-left:70px;margin-top:50px;" >

    <?$this->load->helper('form');?>

    <form class="form-signin" method="POST" action="/seminar/board">

        <?php echo validation_errors('<p class="error">'); ?>
        <?php echo form_open("seminar/board"); ?>

        <table style="width:700px;height:50px;border:5px #CCCCCC solid;">
            <tr>
                <td align="center" valign="middle" style="font-size:30px;font-weight:bold;">Board</td>
            </tr>
        </table>
        <table style="width:700px;height:50px;border:0px;">
            <tr>
                <td align="center" valign="middle" style="width:100px;height:50px;">
                    <input type="text" id="uploader" name="uploader" style="width:300px;" placeHolder="Uploader">
                </td> 
                <td align="center" valign="middle" style="width:100px;height:50px;">
                    <input type="text" id="contents" name="contents" style="width:300px;" placeHolder="Contents">
                </td>
                <td align="center" valign="middle" style="width:50px;height:50px;">
                    <input type="submit" value="저장">
                </td>
            </tr>
        </table>
    </form>

    <!-- 방명록 내용 -->
    <table style="width:700px;border:1px #CCCCCC solid;">
        <tr align="center" valign="middle" style="font-size:20px;font-weight:bold;">
            <td style="padding:5px 5px 5px 5px;">Uploader</td>
            <td style="padding:5px 5px 5px 5px;">Contents</td>
            <td style="padding:5px 5px 5px 5px;">Uploaded Time</td>
        </tr>


        <?
        if($result==NULL){?>
            <tr align="center" valign="middle" style="height:1px;background-color:#CCCCCC;">
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr align="center" valign="middle" style="height:1px;">
                <td>NULL</td>
                <td>NULL</td>
                <td>NULL</td>
            </tr>
        <?}else{

            foreach($result as $item){?>

            <tr align="center" valign="middle" style="height:1px;background-color:#CCCCCC;">
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr align="center" valign="middle" style="font-size:15px;">
                <td style="padding:5px 5px 5px 5px;"><?=$item['uploader']?></td>
                <td style="padding:5px 5px 5px 5px;"><?=$item['contents']?></td>
                <td style="padding:5px 5px 5px 5px;"><?=$item['uptime']?></td>
            </tr>
    <?}}?>
        
    </table>
</div>
