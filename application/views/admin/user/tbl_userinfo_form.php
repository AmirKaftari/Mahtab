<div class='main'>
        <h2 style="margin-top:0px">Tbl_userinfo <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
                <label for="varchar">StatusPic <?php echo form_error('StatusPic') ?></label>
                <input type="text" class="form-control" name="StatusPic" id="StatusPic" placeholder="StatusPic" value="<?php echo $StatusPic; ?>" />
            </div>
	    <div class="form-group">
                <label for="int">IdUser <?php echo form_error('IdUser') ?></label>
                <input type="text" class="form-control" name="IdUser" id="IdUser" placeholder="IdUser" value="<?php echo $IdUser; ?>" />
            </div>
	    <div class="form-group">
                <label for="date">Birthday <?php echo form_error('Birthday') ?></label>
                <input type="text" class="form-control" name="Birthday" id="Birthday" placeholder="Birthday" value="<?php echo $Birthday; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">State <?php echo form_error('State') ?></label>
                <input type="text" class="form-control" name="State" id="State" placeholder="State" value="<?php echo $State; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">City <?php echo form_error('City') ?></label>
                <input type="text" class="form-control" name="City" id="City" placeholder="City" value="<?php echo $City; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">MaridgeState <?php echo form_error('MaridgeState') ?></label>
                <input type="text" class="form-control" name="MaridgeState" id="MaridgeState" placeholder="MaridgeState" value="<?php echo $MaridgeState; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Education <?php echo form_error('Education') ?></label>
                <input type="text" class="form-control" name="Education" id="Education" placeholder="Education" value="<?php echo $Education; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">FieldEducation <?php echo form_error('FieldEducation') ?></label>
                <input type="text" class="form-control" name="FieldEducation" id="FieldEducation" placeholder="FieldEducation" value="<?php echo $FieldEducation; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">JobState <?php echo form_error('JobState') ?></label>
                <input type="text" class="form-control" name="JobState" id="JobState" placeholder="JobState" value="<?php echo $JobState; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">JobTitle <?php echo form_error('JobTitle') ?></label>
                <input type="text" class="form-control" name="JobTitle" id="JobTitle" placeholder="JobTitle" value="<?php echo $JobTitle; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">FamilyIncome <?php echo form_error('FamilyIncome') ?></label>
                <input type="text" class="form-control" name="FamilyIncome" id="FamilyIncome" placeholder="FamilyIncome" value="<?php echo $FamilyIncome; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Income <?php echo form_error('Income') ?></label>
                <input type="text" class="form-control" name="Income" id="Income" placeholder="Income" value="<?php echo $Income; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">HomeState <?php echo form_error('HomeState') ?></label>
                <input type="text" class="form-control" name="HomeState" id="HomeState" placeholder="HomeState" value="<?php echo $HomeState; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">CarState <?php echo form_error('CarState') ?></label>
                <input type="text" class="form-control" name="CarState" id="CarState" placeholder="CarState" value="<?php echo $CarState; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Height <?php echo form_error('Height') ?></label>
                <input type="text" class="form-control" name="Height" id="Height" placeholder="Height" value="<?php echo $Height; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Weight <?php echo form_error('Weight') ?></label>
                <input type="text" class="form-control" name="Weight" id="Weight" placeholder="Weight" value="<?php echo $Weight; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">SkinColor <?php echo form_error('SkinColor') ?></label>
                <input type="text" class="form-control" name="SkinColor" id="SkinColor" placeholder="SkinColor" value="<?php echo $SkinColor; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Religion <?php echo form_error('Religion') ?></label>
                <input type="text" class="form-control" name="Religion" id="Religion" placeholder="Religion" value="<?php echo $Religion; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Belief <?php echo form_error('Belief') ?></label>
                <input type="text" class="form-control" name="Belief" id="Belief" placeholder="Belief" value="<?php echo $Belief; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Hijab <?php echo form_error('Hijab') ?></label>
                <input type="text" class="form-control" name="Hijab" id="Hijab" placeholder="Hijab" value="<?php echo $Hijab; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">HealthState <?php echo form_error('HealthState') ?></label>
                <input type="text" class="form-control" name="HealthState" id="HealthState" placeholder="HealthState" value="<?php echo $HealthState; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">HealthInfo <?php echo form_error('HealthInfo') ?></label>
                <input type="text" class="form-control" name="HealthInfo" id="HealthInfo" placeholder="HealthInfo" value="<?php echo $HealthInfo; ?>" />
            </div>
	    <div class="form-group">
                <label for="Iam">Iam <?php echo form_error('Iam') ?></label>
                <textarea class="form-control" rows="3" name="Iam" id="Iam" placeholder="Iam"><?php echo $Iam; ?></textarea>
            </div>
	    <div class="form-group">
                <label for="WifeIs">WifeIs <?php echo form_error('WifeIs') ?></label>
                <textarea class="form-control" rows="3" name="WifeIs" id="WifeIs" placeholder="WifeIs"><?php echo $WifeIs; ?></textarea>
            </div>
	    <div class="form-group">
                <label for="varchar">TypePerson <?php echo form_error('TypePerson') ?></label>
                <input type="text" class="form-control" name="TypePerson" id="TypePerson" placeholder="TypePerson" value="<?php echo $TypePerson; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">MaridgeScale <?php echo form_error('MaridgeScale') ?></label>
                <input type="text" class="form-control" name="MaridgeScale" id="MaridgeScale" placeholder="MaridgeScale" value="<?php echo $MaridgeScale; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">CountFriends <?php echo form_error('CountFriends') ?></label>
                <input type="text" class="form-control" name="CountFriends" id="CountFriends" placeholder="CountFriends" value="<?php echo $CountFriends; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">LocationLife <?php echo form_error('LocationLife') ?></label>
                <input type="text" class="form-control" name="LocationLife" id="LocationLife" placeholder="LocationLife" value="<?php echo $LocationLife; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Pretty <?php echo form_error('Pretty') ?></label>
                <input type="text" class="form-control" name="Pretty" id="Pretty" placeholder="Pretty" value="<?php echo $Pretty; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Tip <?php echo form_error('Tip') ?></label>
                <input type="text" class="form-control" name="Tip" id="Tip" placeholder="Tip" value="<?php echo $Tip; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">LifeStyle <?php echo form_error('LifeStyle') ?></label>
                <input type="text" class="form-control" name="LifeStyle" id="LifeStyle" placeholder="LifeStyle" value="<?php echo $LifeStyle; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">LocationSelfLife <?php echo form_error('LocationSelfLife') ?></label>
                <input type="text" class="form-control" name="LocationSelfLife" id="LocationSelfLife" placeholder="LocationSelfLife" value="<?php echo $LocationSelfLife; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">UseCigaret <?php echo form_error('UseCigaret') ?></label>
                <input type="text" class="form-control" name="UseCigaret" id="UseCigaret" placeholder="UseCigaret" value="<?php echo $UseCigaret; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">UseAlcohol <?php echo form_error('UseAlcohol') ?></label>
                <input type="text" class="form-control" name="UseAlcohol" id="UseAlcohol" placeholder="UseAlcohol" value="<?php echo $UseAlcohol; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Emigration <?php echo form_error('Emigration') ?></label>
                <input type="text" class="form-control" name="Emigration" id="Emigration" placeholder="Emigration" value="<?php echo $Emigration; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Dowry <?php echo form_error('Dowry') ?></label>
                <input type="text" class="form-control" name="Dowry" id="Dowry" placeholder="Dowry" value="<?php echo $Dowry; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Ofmarriage <?php echo form_error('Ofmarriage') ?></label>
                <input type="text" class="form-control" name="Ofmarriage" id="Ofmarriage" placeholder="Ofmarriage" value="<?php echo $Ofmarriage; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">MyOccupation <?php echo form_error('MyOccupation') ?></label>
                <input type="text" class="form-control" name="MyOccupation" id="MyOccupation" placeholder="MyOccupation" value="<?php echo $MyOccupation; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">MyEducation <?php echo form_error('MyEducation') ?></label>
                <input type="text" class="form-control" name="MyEducation" id="MyEducation" placeholder="MyEducation" value="<?php echo $MyEducation; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">WifeOccupation <?php echo form_error('WifeOccupation') ?></label>
                <input type="text" class="form-control" name="WifeOccupation" id="WifeOccupation" placeholder="WifeOccupation" value="<?php echo $WifeOccupation; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">WifeEducation <?php echo form_error('WifeEducation') ?></label>
                <input type="text" class="form-control" name="WifeEducation" id="WifeEducation" placeholder="WifeEducation" value="<?php echo $WifeEducation; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">StudyScale <?php echo form_error('StudyScale') ?></label>
                <input type="text" class="form-control" name="StudyScale" id="StudyScale" placeholder="StudyScale" value="<?php echo $StudyScale; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">SportScale <?php echo form_error('SportScale') ?></label>
                <input type="text" class="form-control" name="SportScale" id="SportScale" placeholder="SportScale" value="<?php echo $SportScale; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">MateAge <?php echo form_error('MateAge') ?></label>
                <input type="text" class="form-control" name="MateAge" id="MateAge" placeholder="MateAge" value="<?php echo $MateAge; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">MateMarridge <?php echo form_error('MateMarridge') ?></label>
                <input type="text" class="form-control" name="MateMarridge" id="MateMarridge" placeholder="MateMarridge" value="<?php echo $MateMarridge; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">MateLocation <?php echo form_error('MateLocation') ?></label>
                <input type="text" class="form-control" name="MateLocation" id="MateLocation" placeholder="MateLocation" value="<?php echo $MateLocation; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">MateEducation <?php echo form_error('MateEducation') ?></label>
                <input type="text" class="form-control" name="MateEducation" id="MateEducation" placeholder="MateEducation" value="<?php echo $MateEducation; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">MateFatherEducation <?php echo form_error('MateFatherEducation') ?></label>
                <input type="text" class="form-control" name="MateFatherEducation" id="MateFatherEducation" placeholder="MateFatherEducation" value="<?php echo $MateFatherEducation; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">MateMotherEducation <?php echo form_error('MateMotherEducation') ?></label>
                <input type="text" class="form-control" name="MateMotherEducation" id="MateMotherEducation" placeholder="MateMotherEducation" value="<?php echo $MateMotherEducation; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">FatherEducation <?php echo form_error('FatherEducation') ?></label>
                <input type="text" class="form-control" name="FatherEducation" id="FatherEducation" placeholder="FatherEducation" value="<?php echo $FatherEducation; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">MatherEducation <?php echo form_error('MatherEducation') ?></label>
                <input type="text" class="form-control" name="MatherEducation" id="MatherEducation" placeholder="MatherEducation" value="<?php echo $MatherEducation; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">FatherNationality <?php echo form_error('FatherNationality') ?></label>
                <input type="text" class="form-control" name="FatherNationality" id="FatherNationality" placeholder="FatherNationality" value="<?php echo $FatherNationality; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">MatherNationality <?php echo form_error('MatherNationality') ?></label>
                <input type="text" class="form-control" name="MatherNationality" id="MatherNationality" placeholder="MatherNationality" value="<?php echo $MatherNationality; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">AtSon <?php echo form_error('AtSon') ?></label>
                <input type="text" class="form-control" name="AtSon" id="AtSon" placeholder="AtSon" value="<?php echo $AtSon; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">CountBrother <?php echo form_error('CountBrother') ?></label>
                <input type="text" class="form-control" name="CountBrother" id="CountBrother" placeholder="CountBrother" value="<?php echo $CountBrother; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">CountSister <?php echo form_error('CountSister') ?></label>
                <input type="text" class="form-control" name="CountSister" id="CountSister" placeholder="CountSister" value="<?php echo $CountSister; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">MarridgeBroSis <?php echo form_error('MarridgeBroSis') ?></label>
                <input type="text" class="form-control" name="MarridgeBroSis" id="MarridgeBroSis" placeholder="MarridgeBroSis" value="<?php echo $MarridgeBroSis; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">CountChildren <?php echo form_error('CountChildren') ?></label>
                <input type="text" class="form-control" name="CountChildren" id="CountChildren" placeholder="CountChildren" value="<?php echo $CountChildren; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">AgeBigChild <?php echo form_error('AgeBigChild') ?></label>
                <input type="text" class="form-control" name="AgeBigChild" id="AgeBigChild" placeholder="AgeBigChild" value="<?php echo $AgeBigChild; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">CellPhone <?php echo form_error('CellPhone') ?></label>
                <input type="text" class="form-control" name="CellPhone" id="CellPhone" placeholder="CellPhone" value="<?php echo $CellPhone; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Pic <?php echo form_error('Pic') ?></label>
                <input type="text" class="form-control" name="Pic" id="Pic" placeholder="Pic" value="<?php echo $Pic; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">MojaradWife <?php echo form_error('MojaradWife') ?></label>
                <input type="text" class="form-control" name="MojaradWife" id="MojaradWife" placeholder="MojaradWife" value="<?php echo $MojaradWife; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">TalaghWife <?php echo form_error('TalaghWife') ?></label>
                <input type="text" class="form-control" name="TalaghWife" id="TalaghWife" placeholder="TalaghWife" value="<?php echo $TalaghWife; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">DeadWife <?php echo form_error('DeadWife') ?></label>
                <input type="text" class="form-control" name="DeadWife" id="DeadWife" placeholder="DeadWife" value="<?php echo $DeadWife; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Hamshahri <?php echo form_error('Hamshahri') ?></label>
                <input type="text" class="form-control" name="Hamshahri" id="Hamshahri" placeholder="Hamshahri" value="<?php echo $Hamshahri; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">HamOstani <?php echo form_error('HamOstani') ?></label>
                <input type="text" class="form-control" name="HamOstani" id="HamOstani" placeholder="HamOstani" value="<?php echo $HamOstani; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">HamVatan <?php echo form_error('HamVatan') ?></label>
                <input type="text" class="form-control" name="HamVatan" id="HamVatan" placeholder="HamVatan" value="<?php echo $HamVatan; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Kharej <?php echo form_error('Kharej') ?></label>
                <input type="text" class="form-control" name="Kharej" id="Kharej" placeholder="Kharej" value="<?php echo $Kharej; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">MateAgeTo <?php echo form_error('MateAgeTo') ?></label>
                <input type="text" class="form-control" name="MateAgeTo" id="MateAgeTo" placeholder="MateAgeTo" value="<?php echo $MateAgeTo; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">MateEducationTo <?php echo form_error('MateEducationTo') ?></label>
                <input type="text" class="form-control" name="MateEducationTo" id="MateEducationTo" placeholder="MateEducationTo" value="<?php echo $MateEducationTo; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">MateFatherEducationTo <?php echo form_error('MateFatherEducationTo') ?></label>
                <input type="text" class="form-control" name="MateFatherEducationTo" id="MateFatherEducationTo" placeholder="MateFatherEducationTo" value="<?php echo $MateFatherEducationTo; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">MateMotherEducationTo <?php echo form_error('MateMotherEducationTo') ?></label>
                <input type="text" class="form-control" name="MateMotherEducationTo" id="MateMotherEducationTo" placeholder="MateMotherEducationTo" value="<?php echo $MateMotherEducationTo; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">GhadAs <?php echo form_error('GhadAs') ?></label>
                <input type="text" class="form-control" name="GhadAs" id="GhadAs" placeholder="GhadAs" value="<?php echo $GhadAs; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">GhadTa <?php echo form_error('GhadTa') ?></label>
                <input type="text" class="form-control" name="GhadTa" id="GhadTa" placeholder="GhadTa" value="<?php echo $GhadTa; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">VaznAs <?php echo form_error('VaznAs') ?></label>
                <input type="text" class="form-control" name="VaznAs" id="VaznAs" placeholder="VaznAs" value="<?php echo $VaznAs; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">VaznTa <?php echo form_error('VaznTa') ?></label>
                <input type="text" class="form-control" name="VaznTa" id="VaznTa" placeholder="VaznTa" value="<?php echo $VaznTa; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Sefid <?php echo form_error('Sefid') ?></label>
                <input type="text" class="form-control" name="Sefid" id="Sefid" placeholder="Sefid" value="<?php echo $Sefid; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">SabzeRoshan <?php echo form_error('SabzeRoshan') ?></label>
                <input type="text" class="form-control" name="SabzeRoshan" id="SabzeRoshan" placeholder="SabzeRoshan" value="<?php echo $SabzeRoshan; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">SabzeTire <?php echo form_error('SabzeTire') ?></label>
                <input type="text" class="form-control" name="SabzeTire" id="SabzeTire" placeholder="SabzeTire" value="<?php echo $SabzeTire; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">DarAmadFamilyAs <?php echo form_error('DarAmadFamilyAs') ?></label>
                <input type="text" class="form-control" name="DarAmadFamilyAs" id="DarAmadFamilyAs" placeholder="DarAmadFamilyAs" value="<?php echo $DarAmadFamilyAs; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">DarAmadFamilyTa <?php echo form_error('DarAmadFamilyTa') ?></label>
                <input type="text" class="form-control" name="DarAmadFamilyTa" id="DarAmadFamilyTa" placeholder="DarAmadFamilyTa" value="<?php echo $DarAmadFamilyTa; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">DaramadHamsarAs <?php echo form_error('DaramadHamsarAs') ?></label>
                <input type="text" class="form-control" name="DaramadHamsarAs" id="DaramadHamsarAs" placeholder="DaramadHamsarAs" value="<?php echo $DaramadHamsarAs; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">DaramadHamsarTa <?php echo form_error('DaramadHamsarTa') ?></label>
                <input type="text" class="form-control" name="DaramadHamsarTa" id="DaramadHamsarTa" placeholder="DaramadHamsarTa" value="<?php echo $DaramadHamsarTa; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">HomeNadarad <?php echo form_error('HomeNadarad') ?></label>
                <input type="text" class="form-control" name="HomeNadarad" id="HomeNadarad" placeholder="HomeNadarad" value="<?php echo $HomeNadarad; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">HomeDarad <?php echo form_error('HomeDarad') ?></label>
                <input type="text" class="form-control" name="HomeDarad" id="HomeDarad" placeholder="HomeDarad" value="<?php echo $HomeDarad; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">CarDarad <?php echo form_error('CarDarad') ?></label>
                <input type="text" class="form-control" name="CarDarad" id="CarDarad" placeholder="CarDarad" value="<?php echo $CarDarad; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">CarNadarad <?php echo form_error('CarNadarad') ?></label>
                <input type="text" class="form-control" name="CarNadarad" id="CarNadarad" placeholder="CarNadarad" value="<?php echo $CarNadarad; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Sheea <?php echo form_error('Sheea') ?></label>
                <input type="text" class="form-control" name="Sheea" id="Sheea" placeholder="Sheea" value="<?php echo $Sheea; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Soni <?php echo form_error('Soni') ?></label>
                <input type="text" class="form-control" name="Soni" id="Soni" placeholder="Soni" value="<?php echo $Soni; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">DinMasih <?php echo form_error('DinMasih') ?></label>
                <input type="text" class="form-control" name="DinMasih" id="DinMasih" placeholder="DinMasih" value="<?php echo $DinMasih; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">DinYahod <?php echo form_error('DinYahod') ?></label>
                <input type="text" class="form-control" name="DinYahod" id="DinYahod" placeholder="DinYahod" value="<?php echo $DinYahod; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">MazhabiMoghayad <?php echo form_error('MazhabiMoghayad') ?></label>
                <input type="text" class="form-control" name="MazhabiMoghayad" id="MazhabiMoghayad" placeholder="MazhabiMoghayad" value="<?php echo $MazhabiMoghayad; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Mazhabi <?php echo form_error('Mazhabi') ?></label>
                <input type="text" class="form-control" name="Mazhabi" id="Mazhabi" placeholder="Mazhabi" value="<?php echo $Mazhabi; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">UnMazhabi <?php echo form_error('UnMazhabi') ?></label>
                <input type="text" class="form-control" name="UnMazhabi" id="UnMazhabi" placeholder="UnMazhabi" value="<?php echo $UnMazhabi; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">MohajabeChadori <?php echo form_error('MohajabeChadori') ?></label>
                <input type="text" class="form-control" name="MohajabeChadori" id="MohajabeChadori" placeholder="MohajabeChadori" value="<?php echo $MohajabeChadori; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">BadHejab <?php echo form_error('BadHejab') ?></label>
                <input type="text" class="form-control" name="BadHejab" id="BadHejab" placeholder="BadHejab" value="<?php echo $BadHejab; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Bihejab <?php echo form_error('Bihejab') ?></label>
                <input type="text" class="form-control" name="Bihejab" id="Bihejab" placeholder="Bihejab" value="<?php echo $Bihejab; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Salem <?php echo form_error('Salem') ?></label>
                <input type="text" class="form-control" name="Salem" id="Salem" placeholder="Salem" value="<?php echo $Salem; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">BimarKhas <?php echo form_error('BimarKhas') ?></label>
                <input type="text" class="form-control" name="BimarKhas" id="BimarKhas" placeholder="BimarKhas" value="<?php echo $BimarKhas; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">NaghsOzv <?php echo form_error('NaghsOzv') ?></label>
                <input type="text" class="form-control" name="NaghsOzv" id="NaghsOzv" placeholder="NaghsOzv" value="<?php echo $NaghsOzv; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Daroongara <?php echo form_error('Daroongara') ?></label>
                <input type="text" class="form-control" name="Daroongara" id="Daroongara" placeholder="Daroongara" value="<?php echo $Daroongara; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Boroongara <?php echo form_error('Boroongara') ?></label>
                <input type="text" class="form-control" name="Boroongara" id="Boroongara" placeholder="Boroongara" value="<?php echo $Boroongara; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Fars <?php echo form_error('Fars') ?></label>
                <input type="text" class="form-control" name="Fars" id="Fars" placeholder="Fars" value="<?php echo $Fars; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Tork <?php echo form_error('Tork') ?></label>
                <input type="text" class="form-control" name="Tork" id="Tork" placeholder="Tork" value="<?php echo $Tork; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Kord <?php echo form_error('Kord') ?></label>
                <input type="text" class="form-control" name="Kord" id="Kord" placeholder="Kord" value="<?php echo $Kord; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Lor <?php echo form_error('Lor') ?></label>
                <input type="text" class="form-control" name="Lor" id="Lor" placeholder="Lor" value="<?php echo $Lor; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Balooch <?php echo form_error('Balooch') ?></label>
                <input type="text" class="form-control" name="Balooch" id="Balooch" placeholder="Balooch" value="<?php echo $Balooch; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Mazandaran <?php echo form_error('Mazandaran') ?></label>
                <input type="text" class="form-control" name="Mazandaran" id="Mazandaran" placeholder="Mazandaran" value="<?php echo $Mazandaran; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Gilak <?php echo form_error('Gilak') ?></label>
                <input type="text" class="form-control" name="Gilak" id="Gilak" placeholder="Gilak" value="<?php echo $Gilak; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Arab <?php echo form_error('Arab') ?></label>
                <input type="text" class="form-control" name="Arab" id="Arab" placeholder="Arab" value="<?php echo $Arab; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Sayer <?php echo form_error('Sayer') ?></label>
                <input type="text" class="form-control" name="Sayer" id="Sayer" placeholder="Sayer" value="<?php echo $Sayer; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">FarzandNadarad <?php echo form_error('FarzandNadarad') ?></label>
                <input type="text" class="form-control" name="FarzandNadarad" id="FarzandNadarad" placeholder="FarzandNadarad" value="<?php echo $FarzandNadarad; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">FarzandDarad <?php echo form_error('FarzandDarad') ?></label>
                <input type="text" class="form-control" name="FarzandDarad" id="FarzandDarad" placeholder="FarzandDarad" value="<?php echo $FarzandDarad; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">SigarNadrad <?php echo form_error('SigarNadrad') ?></label>
                <input type="text" class="form-control" name="SigarNadrad" id="SigarNadrad" placeholder="SigarNadrad" value="<?php echo $SigarNadrad; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">SigarDarad <?php echo form_error('SigarDarad') ?></label>
                <input type="text" class="form-control" name="SigarDarad" id="SigarDarad" placeholder="SigarDarad" value="<?php echo $SigarDarad; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">AlcolNadarad <?php echo form_error('AlcolNadarad') ?></label>
                <input type="text" class="form-control" name="AlcolNadarad" id="AlcolNadarad" placeholder="AlcolNadarad" value="<?php echo $AlcolNadarad; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">AlcolDarad <?php echo form_error('AlcolDarad') ?></label>
                <input type="text" class="form-control" name="AlcolDarad" id="AlcolDarad" placeholder="AlcolDarad" value="<?php echo $AlcolDarad; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">MohajeratDarad <?php echo form_error('MohajeratDarad') ?></label>
                <input type="text" class="form-control" name="MohajeratDarad" id="MohajeratDarad" placeholder="MohajeratDarad" value="<?php echo $MohajeratDarad; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">MohajeratNadarad <?php echo form_error('MohajeratNadarad') ?></label>
                <input type="text" class="form-control" name="MohajeratNadarad" id="MohajeratNadarad" placeholder="MohajeratNadarad" value="<?php echo $MohajeratNadarad; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">TedadBaraKha <?php echo form_error('TedadBaraKha') ?></label>
                <input type="text" class="form-control" name="TedadBaraKha" id="TedadBaraKha" placeholder="TedadBaraKha" value="<?php echo $TedadBaraKha; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Bikar <?php echo form_error('Bikar') ?></label>
                <input type="text" class="form-control" name="Bikar" id="Bikar" placeholder="Bikar" value="<?php echo $Bikar; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Shaghel <?php echo form_error('Shaghel') ?></label>
                <input type="text" class="form-control" name="Shaghel" id="Shaghel" placeholder="Shaghel" value="<?php echo $Shaghel; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Daneshjoo <?php echo form_error('Daneshjoo') ?></label>
                <input type="text" class="form-control" name="Daneshjoo" id="Daneshjoo" placeholder="Daneshjoo" value="<?php echo $Daneshjoo; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Complete_Profile <?php echo form_error('Complete_Profile') ?></label>
                <input type="text" class="form-control" name="Complete_Profile" id="Complete_Profile" placeholder="Complete_Profile" value="<?php echo $Complete_Profile; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">MahojabeKamel <?php echo form_error('MahojabeKamel') ?></label>
                <input type="text" class="form-control" name="MahojabeKamel" id="MahojabeKamel" placeholder="MahojabeKamel" value="<?php echo $MahojabeKamel; ?>" />
            </div>
	    <input type="hidden" name="ID" value="<?php echo $ID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('userinfo') ?>" class="btn btn-default">انصراف</a>
	</form>
    </div>