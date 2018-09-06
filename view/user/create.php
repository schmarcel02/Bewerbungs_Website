<div class="content-wrapper">
    <h2><?= TextUtil::getText("title_register") ?></h2>
    <form id="frmRegister" class="form" action="/user/doCreate" method="post">
        <div><label for="txtMail"><?= TextUtil::getText("label_mail") ?></label><br><input class="form_input"
                                                                                           type="text" id="txtMail"
                                                                                           name="txtMail"></div>
        <div><label for="txtOrg"><?= TextUtil::getText("label_org") ?></label><br><input class="form_input" type="text"
                                                                                         id="txtOrg" name="txtOrg">
        </div>
        <div><label for="txtPass"><?= TextUtil::getText("label_pass") ?></label><br><input class="form_input"
                                                                                           type="password" id="txtPass"
                                                                                           name="txtPass"></div>
        <div><label for="txtPassR"><?= TextUtil::getText("label_passR") ?></label><br><input class="form_input"
                                                                                             type="password"
                                                                                             id="txtPassR"
                                                                                             name="txtPassR"></div>
        <div><label for="txtKey"><?= TextUtil::getText("label_key") ?></label><br><input class="form_input"
                                                                                         type="password" id="txtKey"
                                                                                         name="txtKey"></div>
        <button type="submit">Register</button>
        <br>
        <?= TextUtil::getText("text_required_fields") ?>
    </form>
</div>
