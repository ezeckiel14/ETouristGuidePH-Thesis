<div class="userPane">
	<h3>Registration</h3>
	<hr>
	<p>You must fill in all fields in order for you to create your account.</p>
	<?php
		if(isset($_POST['register'])){
			include "./designIncludes/phpLogicIncludes/validateRegistration.php";			
		}
		if(!isset($_POST['register'])){
			echo "<p style=\"color:red;\">All fields marked with * should be filled up completely.</p>";
		}		 		
	?>
	<form method="POST">
	<p><u>Log-in Credentials:</u></p>
	<p>Desired Username: <input type="text" size="16" name="username"/>*</p>
	<p>Desired Password:&numsp;<input type="password" size="16" name="password"/>*</p>
	<p>Confirm Password:&nbsp;<input type="password" size="16" name="confirmpassword"/>*</p>
	<p>E-mail Address: &nbsp;<input type="text" size="24" name="email"/>*</p>
	<p><u>Personal Data:</u></p>
	<p>Last Name: <input type="text" size="16" name="lastName"/>*</p>
	<p>First Name: <input type="text" size="16" name="firstName"/>*</p>
	<p>Birthday: <select name = "birthyear">
					<?php include "./designIncludes/phpLogicIncludes/birthyear.php";?></select> 
		         <select name = "birthmonth">
		           	<option value = "Jan">January</option>
		         	<option value = "Feb">February</option>
		         	<option value = "Mar">March</option>
		         	<option value = "Apr">April</option>
		         	<option value = "May">May</option>
		         	<option value = "Jun">June</option>
		         	<option value = "Jul">July</option>
		         	<option value = "Aug">August</option>
		         	<option value = "Sep">September</option>
		         	<option value = "Oct">October</option>
		         	<option value = "Nov">November</option>
		         	<option value = "Dec">December</option>
		         </select> 
		         <select name = "birthday">
		         	<?php include "./designIncludes/phpLogicIncludes/birthdate.php";?></select>*
				<p>Country of Origin: *<select name="country">
							<option value="AF">Afghanistan (افغانستان)</option>
							<option value="AL">Albania (Shqipëria)</option>
							<option value="DZ">Algeria (الجزائر)</option>
							<option value="AD">Andorra</option>
							<option value="AO">Angola</option>
							<option value="AI">Anguilla</option>
							<option value="AG">Antigua and Barbuda</option>
							<option value="AR">Argentina</option>
							<option value="AM">Armenia</option>
							<option value="AW">Aruba</option>
							<option value="AU">Australia</option>
							<option value="AT">Austria (Österreich)</option>
							<option value="AZ">Azerbaijan (Azərbaycan)</option>
							<option value="BS">Bahamas</option>
							<option value="BH">Bahrain (البحرين)</option>
							<option value="BD">Bangladesh (বাংলাদেশ)</option>
							<option value="BB">Barbados</option>
							<option value="BY">Belarus (Белару́сь)</option>
							<option value="BE">Belgium (België)</option>
							<option value="BJ">Benin (Bénin)</option>
							<option value="BM">Bermuda</option>
							<option value="BO">Bolivia</option>
							<option value="BA">Bosnia and Herzegovina (Bosna i Hercegovina)</option>
							<option value="BR">Brazil (Brasil)</option>
							<option value="BN">Brunei (Brunei Darussalam)</option>
							<option value="BG">Bulgaria (България)</option>
							<option value="BF">Burkina Faso</option>
							<option value="BI">Burundi (Uburundi)</option>
							<option value="KH">Cambodia (Kampuchea)</option>
							<option value="CM">Cameroon (Cameroun)</option>
							<option value="CA">Canada</option>
							<option value="KY">Cayman Islands</option>
							<option value="CF">Central African Republic (République Centrafricaine)</option>
							<option value="TD">Chad (Tchad)</option>
							<option value="CL">Chile</option>
							<option value="CN">China (中国)</option>
							<option value="CO">Colombia</option>
							<option value="KM">Comoros (Comores)</option>
							<option value="CD">Congo [DRC]</option>
							<option value="CG">Congo [Republic]</option>
							<option value="CR">Costa Rica</option>
							<option value="HR">Croatia (Hrvatska)</option>
							<option value="CU">Cuba</option>
							<option value="CY">Cyprus (Κυπρος)</option>
							<option value="CZ">Czech Republic (Česko)</option>
							<option value="DK">Denmark (Danmark)</option>
							<option value="DJ">Djibouti</option>
							<option value="DM">Dominica</option>
							<option value="DO">Dominican Republic</option>
							<option value="EC">Ecuador</option>
							<option value="EG">Egypt (مصر)</option>
							<option value="SV">El Salvador</option>
							<option value="GQ">Equatorial Guinea (Guinea Ecuatorial)</option>
							<option value="ER">Eritrea (Ertra)</option>
							<option value="EE">Estonia (Eesti)</option>
							<option value="ET">Ethiopia (Ityop&#39;iya)</option>
							<option value="FO">Faroe Islands</option>
							<option value="FJ">Fiji</option>
							<option value="FI">Finland (Suomi)</option>
							<option value="FR">France</option>
							<option value="GF">French Guiana</option>
							<option value="GA">Gabon</option>
							<option value="GM">Gambia</option>
							<option value="GE">Georgia (საქართველო)</option>
							<option value="DE">Germany (Deutschland)</option>
							<option value="GH">Ghana</option>
							<option value="GI">Gibraltar</option>
							<option value="GR">Greece (Ελλάς)</option>
							<option value="GD">Grenada</option>
							<option value="GP">Guadeloupe</option>
							<option value="GT">Guatemala</option>
							<option value="GN">Guinea (Guinée)</option>
							<option value="GW">Guinea-Bissau (Guiné-Bissau)</option>
							<option value="GY">Guyana</option>
							<option value="HN">Honduras</option>
							<option value="HK">Hong Kong</option>
							<option value="HU">Hungary (Magyarország)</option>
							<option value="IS">Iceland (Ísland)</option>
							<option value="IN">India</option>
							<option value="ID">Indonesia</option>
							<option value="IR">Iran (ایران)</option>
							<option value="IQ">Iraq (العراق)</option>
							<option value="IE">Ireland</option>
							<option value="IL">Israel (ישראל)</option>
							<option value="IT">Italy (Italia)</option>
							<option value="JM">Jamaica</option>
							<option value="JP">Japan (日本)</option>
							<option value="JO">Jordan (الاردن)</option>
							<option value="KZ">Kazakhstan(Казахстан)</option>
							<option value="KE">Kenya</option>
							<option value="KW">Kuwait (الكويت)</option>
							<option value="KG">Kyrgyzstan (Кыргызстан)</option>
							<option value="LA">Laos (ນລາວ)</option>
							<option value="LV">Latvia (Latvija)</option>
							<option value="LB">Lebanon (لبنان)</option>
							<option value="LS">Lesotho</option>
							<option value="LR">Liberia</option>
							<option value="LI">Liechtenstein</option>
							<option value="LT">Lithuania (Lietuva)</option>
							<option value="LU">Luxembourg (Lëtzebuerg)</option>
							<option value="MO">Macau</option>
							<option value="MK">Macedonia [FYROM] (Македонија)</option>
							<option value="MG">Madagascar (Madagasikara)</option>
							<option value="MW">Malawi</option>
							<option value="MY">Malaysia</option>
							<option value="MV">Maldives (ގުޖޭއްރާ ޔާއްރިހޫމްޖ)</option>
							<option value="ML">Mali</option>
							<option value="MT">Malta</option>
							<option value="MQ">Martinique</option>
							<option value="MR">Mauritania (موريتانيا)</option>
							<option value="MU">Mauritius</option>
							<option value="MX">Mexico (México)</option>
							<option value="MD">Moldova</option>
							<option value="MC">Monaco</option>
							<option value="MN">Mongolia (Монгол Улс)</option>
							<option value="ME">Montenegro (Црна Гора)</option>
							<option value="MS">Montserrat</option>
							<option value="MA">Morocco (المغرب)</option>
							<option value="MZ">Mozambique (Moçambique)</option>
							<option value="MM">Myanmar [Burma] (Myanmar (Burma))</option>
							<option value="NA">Namibia</option>
							<option value="NR">Nauru (Naoero)</option>
							<option value="NP">Nepal (नेपाल)</option>
							<option value="NL">Netherlands (Nederland)</option>
							<option value="NZ">New Zealand</option>
							<option value="NI">Nicaragua</option>
							<option value="KP">North Korea (조선)</option>
							<option value="NO">Norway (Norge)</option>
							<option value="OM">Oman (عمان)</option>
							<option value="PK">Pakistan (پاکستان)</option>
							<option value="PS">Palestinian Territories</option>
							<option value="PA">Panama (Panamá)</option>
							<option value="PG">Papua New Guinea</option>
							<option value="PY">Paraguay</option>
							<option value="PE">Peru (Perú)</option>
							<option value="PH" selected="selected">Philippines (Pilipinas)</option>
							<option value="PL">Poland (Polska)</option>
							<option value="PT">Portugal</option>
							<option value="QA">Qatar (قطر)</option>
							<option value="RO">Romania (România)</option>
							<option value="RU">Russia (Россия)</option>
							<option value="RW">Rwanda</option>
							<option value="RE">Réunion</option>
							<option value="KN">Saint Kitts and Nevis</option>
							<option value="LC">Saint Lucia</option>
							<option value="VC">Saint Vincent and the Grenadines</option>
							<option value="SA">Saudi Arabia (المملكة العربية السعودية)</option>
							<option value="SN">Senegal (Sénégal)</option>
							<option value="RS">Serbia (Србија)</option>
							<option value="SL">Sierra Leone</option>
							<option value="SG">Singapore (Singapura)</option>
							<option value="SK">Slovakia (Slovensko)</option>
							<option value="SI">Slovenia (Slovenija)</option>
							<option value="ZA">South Africa</option>
							<option value="KR">South Korea (한국)</option>
							<option value="ES">Spain (España)</option>
							<option value="LK">Sri Lanka</option>
							<option value="SD">Sudan (السودان)</option>
							<option value="SR">Suriname</option>
							<option value="SZ">Swaziland</option>
							<option value="SE">Sweden (Sverige)</option>
							<option value="CH">Switzerland (Schweiz)</option>
							<option value="SY">Syria (سوريا)</option>
							<option value="TW">Taiwan (台灣)</option>
							<option value="TJ">Tajikistan (Тоҷикистон)</option>
							<option value="TZ">Tanzania</option>
							<option value="TH">Thailand (ราชอาณาจักรไทย)</option>
							<option value="TG">Togo</option>
							<option value="TT">Trinidad and Tobago</option>
							<option value="TN">Tunisia (تونس)</option>
							<option value="TR">Turkey (Türkiye)</option>
							<option value="TM">Turkmenistan (Türkmenistan)</option>
							<option value="UG">Uganda</option>
							<option value="UA">Ukraine (Україна)</option>
							<option value="AE">United Arab Emirates (الإمارات العربيّة المتّحدة)</option>
							<option value="GB">United Kingdom</option>
							<option value="US">United States</option>
							<option value="UY">Uruguay</option>
							<option value="UZ">Uzbekistan (O&#39;zbekiston)</option>
							<option value="VE">Venezuela</option>
							<option value="VN">Vietnam (Việt Nam)</option>
							<option value="YE">Yemen (اليمن)</option>
							<option value="ZM">Zambia</option>
							<option value="ZW">Zimbabwe</option>
					</select></p>
	
	<input type="submit" value="Register" name="register"/> <input type="reset" value="Clear All"/> <a href="index.php">Return to Log-in</a>
	<p>
	</form>
</div>
