<div class="from-login">
	<div class="from-ldpage">
		<div class="content">
			<div class="content-from">
				<div class="title-tab title-tab-fix-mb">
					<h3>連帯保証人基本情報</h3>
				</div>
					<!-- FORM -->
					<?php echo $this->element('flash');?>
		            <div class="block-warning" id="error-section" style="display:none">
		                <?php echo __('global.errors'); ?>
		            </div>
					<div class="content-from-block">
						<div class="content-from-how">
							<table class="from" id="theform">
								<tbody>
									<tr>
										<td class="label-text"><label>申込人氏名</label><span>必須</span></td>
										<td>
											<div class="block-input">
												<div class="div-style">
													<span class="w-auto">姓</span>
													<input class="w198" type="text" name="example4" value="" placeholder="山田">

												</div>
												<div class="div-style">
													<span class="w-auto">名</span>
													<input class="w198" type="text" name="" value="" placeholder="太郎" >
												</div>
											</div>
											<div class="block-input">
												<div class="div-style">
													<span class="w-auto">セイ</span>
													<input class="w198" type="text" name="" value="" placeholder="ヤマダ">
												</div>
												<div class="div-style">
													<span class="w-auto">メイ</span>
													<input class="w198" type="text" name="" value="" placeholder="タロウ">
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td class="label-text"><label>性別</label><span>必須</span></td>
										<td>
											<div class="form-radio">
												<div class="form-w">
													<div class="block-input-radio">
														<input type="radio" name="sex" value="1" id="1"><label for="1">男性</label>
													</div>
													<div class="block-input-radio">
														<input type="radio" name="sex" value="1" id="2" ><label for="2">女性</label>
													</div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td class="label-text"><label>生年月日</label><span>必須</span></td>
										<td>
											<div class="select">
												<select>
													<option>--</option>
													<option value="2015">2015</option>
													<option value="2014">2014</option>
													<option value="2013">2013</option>
													<option value="2012">2012</option>
													<option value="2011">2011</option>
													<option value="2010">2010</option>
													<option value="2009">2009</option>
													<option value="2008">2008</option>
													<option value="2007">2007</option>
													<option value="2006">2006</option>
													<option value="2005">2005</option>
													<option value="2004">2004</option>
													<option value="2003">2003</option>
													<option value="2002">2002</option>
													<option value="2001">2001</option>
													<option value="2000">2000</option>
													<option value="1999">1999</option>
													<option value="1998">1998</option>
													<option value="1997">1997</option>
													<option value="1996">1996</option>
													<option value="1995">1995</option>
													<option value="1994">1994</option>
													<option value="1993">1993</option>
													<option value="1992">1992</option>
													<option value="1991">1991</option>
													<option value="1990">1990</option>
													<option value="1989">1989</option>
													<option value="1988">1988</option>
													<option value="1987">1987</option>
													<option value="1986">1986</option>
													<option value="1985">1985</option>
													<option value="1984">1984</option>
													<option value="1983">1983</option>
													<option value="1982">1982</option>
													<option value="1981">1981</option>
													<option value="1980">1980</option>
													<option value="1979">1979</option>
													<option value="1978">1978</option>
													<option value="1977">1977</option>
													<option value="1976">1976</option>
													<option value="1975">1975</option>
													<option value="1974">1974</option>
													<option value="1973">1973</option>
													<option value="1972">1972</option>
													<option value="1971">1971</option>
													<option value="1970">1970</option>
													<option value="1969">1969</option>
													<option value="1968">1968</option>
													<option value="1967">1967</option>
													<option value="1966">1966</option>
													<option value="1965">1965</option>
													<option value="1964">1964</option>
													<option value="1963">1963</option>
													<option value="1962">1962</option>
													<option value="1961">1961</option>
													<option value="1960">1960</option>
													<option value="1959">1959</option>
													<option value="1958">1958</option>
													<option value="1957">1957</option>
													<option value="1956">1956</option>
													<option value="1955">1955</option>
													<option value="1954">1954</option>
													<option value="1953">1953</option>
													<option value="1952">1952</option>
													<option value="1951">1951</option>
													<option value="1950">1950</option>
													<option value="1949">1949</option>
													<option value="1948">1948</option>
													<option value="1947">1947</option>
													<option value="1946">1946</option>
													<option value="1945">1945</option>
													<option value="1944">1944</option>
													<option value="1943">1943</option>
													<option value="1942">1942</option>
													<option value="1941">1941</option>
													<option value="1940">1940</option>
													<option value="1939">1939</option>
													<option value="1938">1938</option>
													<option value="1937">1937</option>
													<option value="1936">1936</option>
													<option value="1935">1935</option>
													<option value="1934">1934</option>
													<option value="1933">1933</option>
													<option value="1932">1932</option>
													<option value="1931">1931</option>
													<option value="1930">1930</option>
													<option value="1929">1929</option>
													<option value="1928">1928</option>
													<option value="1927">1927</option>
													<option value="1926">1926</option>
													<option value="1925">1925</option>
													<option value="1924">1924</option>
													<option value="1923">1923</option>
													<option value="1922">1922</option>
													<option value="1921">1921</option>
													<option value="1920">1920</option>
													<option value="1919">1919</option>
													<option value="1918">1918</option>
													<option value="1917">1917</option>
													<option value="1916">1916</option>
													<option value="1915">1915</option>
													<option value="1914">1914</option>
													<option value="1913">1913</option>
													<option value="1912">1912</option>
													<option value="1911">1911</option>
													<option value="1910">1910</option>
													<option value="1909">1909</option>
													<option value="1908">1908</option>
													<option value="1907">1907</option>
													<option value="1906">1906</option>
													<option value="1905">1905</option>
													<option value="1904">1904</option>
													<option value="1903">1903</option>
													<option value="1902">1902</option>
													<option value="1901">1901</option>
													<option value="1900">1900</option>
												</select>
												<span>年</span>
												<select>
													<option>--</option>
													<option value="01">01</option>
													<option value="02">02</option>
													<option value="03">03</option>
													<option value="04">04</option>
													<option value="05">05</option>
													<option value="06">06</option>
													<option value="07">07</option>
													<option value="08">08</option>
													<option value="09">09</option>
													<option value="10">10</option>
													<option value="11">11</option>
													<option value="12">12</option>
												</select>
												<span>月</span>
												<select>
													<option>--</option>
													<option value="01">01</option>
													<option value="02">02</option>
													<option value="03">03</option>
													<option value="04">04</option>
													<option value="05">05</option>
													<option value="06">06</option>
													<option value="07">07</option>
													<option value="08">08</option>
													<option value="09">09</option>
													<option value="10">10</option>
													<option value="11">11</option>
													<option value="12">12</option>
													<option value="13">13</option>
													<option value="14">14</option>
													<option value="15">15</option>
													<option value="16">16</option>
													<option value="17">17</option>
													<option value="18">18</option>
													<option value="19">19</option>
													<option value="20">20</option>
													<option value="21">21</option>
													<option value="22">22</option>
													<option value="23">23</option>
													<option value="24">24</option>
													<option value="25">25</option>
													<option value="26">26</option>
													<option value="27">27</option>
													<option value="28">28</option>
													<option value="29">29</option>
													<option value="30">30</option>
													<option value="31">31</option>
												</select>
												<span>日</span>
												<span class="style">（00歳）</span>
											</div>
										</td>
									</tr>
									<tr>
										<td class="label-text"><label>婚姻</label><span>必須</span></td>
										<td>
											<div class="form-radio">
												<div class="form-w">
													<div class="block-input-radio">
														<input type="radio" name="sex" value="1" id="3"><label for="3">既婚</label>
													</div>
													<div class="block-input-radio">
														<input type="radio" name="sex" value="1" id="4"><label for="4">独身</label>
													</div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td class="label-text"><label>家族との居住状況</label><span>必須</span></td>
										<td>
											<div class="form-radio">
												<div class="form-w">
													<div class="block-input-radio">
														<input type="radio" name="sex" value="1" id="3"><label for="3">同居</label>
													</div>
													<div class="block-input-radio">
														<input type="radio" name="sex" value="1" id="4"><label for="4">別居</label>
													</div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td class="label-text"><label>子供の人数</label><span>必須</span></td>
										<td>
											<div class="block-input">
												<input class="w40" type="text" name="" value="" placeholder="00">
												<span class="w-auto1">人</span>
											</div>
										</td>
									</tr>
									<tr>
										<td class="label-text"><label>申込人との関係</label><span>必須</span></td>
										<td>
											<div class="block-input">
												<input class="w198" type="text" name="" value="" placeholder="例）長男、次女、父、母、叔父など">
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</form>
				<div class="title-tab title-tab-fix-mb title-tab-fix-mt">
					<h3>連帯保証人住所情報</h3>
				</div>
				<form action="">
					<div class="content-from-how">
						<table class="from">
							<tbody>
								<tr>
									<td class="label-text"><label>現住所</label><span>必須</span></td>
									<td>
										<div class="block-input">
											<span class="w-auto1">〒</span>
											<input class="w40" type="text" name="" value="" placeholder="101">
											<span class="w-auto1">-</span>
											<input class="w80" type="text" name="" value="" placeholder="0000">
											<a href="#" class="style-link">郵便番号から住所を検索</a>
										</div>
										<div class="block-input">
											<span class="w78">都道府県</span>
											<input class="w198" type="text" name="" value="" placeholder="東京都">
										</div>
										<div class="block-input">
											<span class="w78">市区町村</span>
											<input class="w198" type="text" name="" value="" placeholder="千代田区神田多町">
										</div>
										<div class="block-input">
											<span class="w78">番地</span>
											<input class="w198" type="text" name="" value="" placeholder="2-14-17">
										</div>
										<div class="block-input">
											<span class="w78">建物</span>
											<input class="w198" type="text" name="" value="" placeholder="グレイス高輪ビル８階">
										</div>
									</td>
									<tr>
										<td class="label-text"><label>居住形態</label><span>必須</span></td>
										<td>
											<div class="select">
												<select class="w198">
													<option>正社員</option>
													<option value="0">選択してください</option>
													<option value="1">営業・販売</option>
													<option value="2">研究・開発・技術者</option>
													<option value="3">総務・人事</option>
													<option value="4">財務・経理</option>
													<option value="5">企画・マーケティング</option>
													<option value="6">広報・広告・デザイン</option>
													<option value="7">事務職</option>
													<option value="8">管理職</option>
													<option value="9">会社経営・役員</option>
													<option value="10">公務員・団体職員</option>
													<option value="11">教職員</option>
													<option value="12">専門職（医師・看護師・弁護士など）</option>
													<option value="13">自由業</option>
													<option value="14">自営業</option>
													<option value="15">パート・アルバイト</option>
													<option value="16">契約社員・派遣社員</option>
													<option value="17">専業主婦（主夫）</option>
													<option value="18">無職</option>
													<option value="19">小学生</option>
													<option value="20">中学生</option>
													<option value="21">高校生</option>
													<option value="22">短大・専門学校生</option>
													<option value="23">大学生</option>
													<option value="24">大学院生</option>
												</select>
											</div>
										</td>
									</tr>
									<tr>
										<td class="label-text"><label>居住年数</label><span>必須</span></td>
										<td>
											<div class="block-input">
												<input class="w40" type="text" name="" value="" placeholder="00">
												<span class="w-auto1">年</span>
											</div>
										</td>
									</tr>
								</tr>
							</tbody>
						</table>
					</div>
				</form>
				
				<div class="title-tab title-tab-fix-mb title-tab-fix-mt">
					<h3>連帯保証人連絡先情報</h3>
				</div>
				<form action="">
					<div class="content-from-how">
						<table class="from">
							<tbody>
								<tr>
									<td class="label-text"><label>電話番号</label><span>必須</span></td>
									<td>
										<div class="block-input fix-padding">
											<div class="div-style">
												<span class="w78">携帯電話</span>
												<input class="w198" type="text" name="" value="" placeholder="例）09012345678">
											</div>
											<div class="div-style">
												<span class="w43">自宅</span>
												<input class="w198" type="text" name="" value="" placeholder="0312345678">
											</div>
										</div>
										<span class="black">※どちらかひとつ必須。”-”ハイフンなしで入力してください。</span>
									</td>
								</tr>
								<tr>
									<td class="label-text"><label>日中連絡先</label><span>必須</span></td>
									<td>
										<div class="form-radio">
											<div class="form-w">
												<div class="block-input-radio">
													<input type="radio" name="sex" value="1" id="11"><label for="11">携帯電話</label>
													<input type="radio" name="sex" value="1" id="22"><label for="22">自宅電話</label>
													<input type="radio" name="sex" value="1" id="33"><label for="33">勤務先</label>
												</div>
											</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</form>
				<div class="title-tab title-tab-fix-mb title-tab-fix-mt">
					<h3>連帯保証人勤務先情報</h3>
				</div>
				<form action="">
					<div class="content-from-how">
						<table class="from">
							<tbody>
								<tr>
									<td class="label-text"><label>職業</label><span>必須</span></td>
									<td>
										<div class="select">
											<select class="w198">
												<option>正社員</option>
												<option value="0">選択してください</option>
												<option value="1">営業・販売</option>
												<option value="2">研究・開発・技術者</option>
												<option value="3">総務・人事</option>
												<option value="4">財務・経理</option>
												<option value="5">企画・マーケティング</option>
												<option value="6">広報・広告・デザイン</option>
												<option value="7">事務職</option>
												<option value="8">管理職</option>
												<option value="9">会社経営・役員</option>
												<option value="10">公務員・団体職員</option>
												<option value="11">教職員</option>
												<option value="12">専門職（医師・看護師・弁護士など）</option>
												<option value="13">自由業</option>
												<option value="14">自営業</option>
												<option value="15">パート・アルバイト</option>
												<option value="16">契約社員・派遣社員</option>
												<option value="17">専業主婦（主夫）</option>
												<option value="18">無職</option>
												<option value="19">小学生</option>
												<option value="20">中学生</option>
												<option value="21">高校生</option>
												<option value="22">短大・専門学校生</option>
												<option value="23">大学生</option>
												<option value="24">大学院生</option>
											</select>
										</div>
									</td>
								</tr>
								<tr>
									<td class="label-text"><label>現住所</label><span>必須</span></td>
									<td>
										<div class="block-input">
											<span class="w78">会社名</span>
											<input class="w198" type="text" name="" value="" placeholder="例）株式会社ヤチンデモラエル">
										</div>
										<div class="block-input">
											<span class="w78">フリガナ</span>
											<input class="w198" type="text" name="" value="" placeholder="カブシキガイシャヤチンデモラエル">
										</div>
									</td>
								</tr>
								<tr>
									<td class="label-text"><label>現住所</label></td>
									<td>
										<div class="block-input">
											<span class="w-auto1">〒</span>
											<input class="w40" type="text" name="" value="" placeholder="101">
											<span class="w-auto1">-</span>
											<input class="w80" type="text" name="" value="" placeholder="0000">
											<a href="#" class="style-link">郵便番号から住所を検索</a>
										</div>
										<div class="block-input">
											<span class="w78">都道府県</span>
											<input class="w198" type="text" name="" value="" placeholder="東京都">
										</div>
										<div class="block-input">
											<span class="w78">市区町村</span>
											<input class="w198" type="text" name="" value="" placeholder="千代田区神田多町">
										</div>
										<div class="block-input">
											<span class="w78">番地</span>
											<input class="w198" type="text" name="" value="" placeholder="2-14-17">
										</div>
										<div class="block-input">
											<span class="w78">建物</span>
											<input class="w198" type="text" name="" value="" placeholder="グレイス高輪ビル８階">
										</div>
									</td>
								</tr>
								<tr>
									<td class="label-text"><label>電話番号</label></td>
									<td>
										<div class="block-input fix-padding">
											<div class="div-style">
												<input class="w198" type="text" name="" value="" placeholder="例）09012345678"><span class="style">※”-”ハイフンなしで入力してください。</span>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td class="label-text"><label>FAX番号</label></td>
									<td>
										<div class="block-input fix-padding">
											<div class="div-style">
												<input class="w198" type="text" name="" value="" placeholder="例）0312345678"><span class="style">※”-”ハイフンなしで入力してください。</span>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td class="label-text"><label>業界・業種</label></td>
									<td>
										<div class="select">
											<select class="w198">
												<option>選択してください</option>
												<option value="0">選択してください</option>
												<option value="1">営業・販売</option>
												<option value="2">研究・開発・技術者</option>
												<option value="3">総務・人事</option>
												<option value="4">財務・経理</option>
												<option value="5">企画・マーケティング</option>
												<option value="6">広報・広告・デザイン</option>
												<option value="7">事務職</option>
												<option value="8">管理職</option>
												<option value="9">会社経営・役員</option>
												<option value="10">公務員・団体職員</option>
												<option value="11">教職員</option>
												<option value="12">専門職（医師・看護師・弁護士など）</option>
												<option value="13">自由業</option>
												<option value="14">自営業</option>
												<option value="15">パート・アルバイト</option>
												<option value="16">契約社員・派遣社員</option>
												<option value="17">専業主婦（主夫）</option>
												<option value="18">無職</option>
												<option value="19">小学生</option>
												<option value="20">中学生</option>
												<option value="21">高校生</option>
												<option value="22">短大・専門学校生</option>
												<option value="23">大学生</option>
												<option value="24">大学院生</option>
											</select>
										</div>
									</td>
								</tr>
								<tr>
									<td class="label-text"><label>職種・仕事内容</label></td>
									<td><input class="w40 input-style" type="text" name="" value="" placeholder="例）病院での薬剤師(医療事務)業務、建設会社での営業(設土木作業)業務など"></td>
								</tr>
								<tr>
									<td class="label-text"><label>部署名</label></td>
									<td><input class="w40 input-style" type="text" name="" value="" placeholder="例）営業部 第一営業課"></td>
								</tr>
								<tr>
									<td class="label-text"><label>役職</label></td>
									<td><input class="w40 input-style" type="text" name="" value="" placeholder="例）部長、課長、次長、係長、主任など"></td>
								</tr>
								<tr>
									<td class="label-text"><label>勤続年数</label></td>
									<td>
										<div class="block-input">
											<input class="w40" type="text" name="" value="" placeholder="00">
											<span class="w-auto1">年</span>
											<input class="w40" type="text" name="" value="" placeholder="00">
											<span class="w-auto1">月</span>
										</div>
									</td>
								</tr>
								<tr>
									<td class="label-text"><label>日中連絡先</label><span>必須</span></td>
									<td>
										<div class="form-radio">
											<div class="form-w">
												<div class="block-input-radio">
													<input type="radio" name="sex" value="1" id="11"><label for="11">固定給</label>
													<input type="radio" name="sex" value="1" id="22"><label for="22">一部歩合制</label>
													<input type="radio" name="sex" value="1" id="33"><label for="33">完全歩合制</label>
												</div>
											</div>
										</div>
										<div class="form-radio margin-top">
											<div class="form-w">
												<div class="block-input-radio margin">
													<input type="radio" name="sex" value="1" id="11"><label for="11">その他</label>
												</div>
												<input class="w40 input-style" type="text" name="" value="" placeholder="">
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td class="label-text"><label>税込月収</label></td>
									<td>
										<div class="block-input">
											<input class="w108" type="text" name="" value="" placeholder="000,000">
											<span class="w-auto1">円</span>
										</div>
									</td>
								</tr>
								<tr>
									<td class="label-text"><label>税込年収</label></td>
									<td>
										<div class="block-input">
											<input class="w108" type="text" name="" value="" placeholder="000,000">
											<span class="w-auto1">万円</span>
										</div>
									</td>
								</tr>
								<tr>
									<td class="label-text"><label>日中連絡先</label></td>
									<td>
										<div class="form-radio">
											<div class="form-w">
												<div class="block-input-radio">
													<input type="radio" name="sex" value="1" id="11"><label for="11">日払い</label>
													<input type="radio" name="sex" value="1" id="22"><label for="22">週払い</label>
													<input type="radio" name="sex" value="1" id="33"><label for="33">月払い</label>
												</div>
												<div class="style-a">
													<label for="11">毎月</label><input class="w40" type="text" name="" value="" placeholder="25"><label for="11">日</label>
												</div>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td class="label-text"><label>健康保険種別</label><span>必須</span></td>
									<td>
										<div class="select">
											<select class="w198">
												<option>選択してください</option>
												<option value="0">選択してください</option>
												<option value="1">営業・販売</option>
												<option value="2">研究・開発・技術者</option>
												<option value="3">総務・人事</option>
												<option value="4">財務・経理</option>
												<option value="5">企画・マーケティング</option>
												<option value="6">広報・広告・デザイン</option>
												<option value="7">事務職</option>
												<option value="8">管理職</option>
												<option value="9">会社経営・役員</option>
												<option value="10">公務員・団体職員</option>
												<option value="11">教職員</option>
												<option value="12">専門職（医師・看護師・弁護士など）</option>
												<option value="13">自由業</option>
												<option value="14">自営業</option>
												<option value="15">パート・アルバイト</option>
												<option value="16">契約社員・派遣社員</option>
												<option value="17">専業主婦（主夫）</option>
												<option value="18">無職</option>
												<option value="19">小学生</option>
												<option value="20">中学生</option>
												<option value="21">高校生</option>
												<option value="22">短大・専門学校生</option>
												<option value="23">大学生</option>
												<option value="24">大学院生</option>
											</select>
										</div>
									</td>
								</tr>
								<tr>
									<td class="label-text"><label>備考</label></td>
									<td>
										<span class="black style">※派遣社員の方は派遣先、出向中の方は出向先、入社6ヶ月以下の方は前職の情報を入力ください。<br>※未就業（職業が専業主婦／主夫、無職、その他の方）で収入がある場合、詳細な情報を記載ください。</span>
										<textarea rows="4" cols="50"></textarea>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</form>
				<div class="button-tab">
					<a href="#" class="link-tab-1a"><img src="img/front/link-tab-3.png" alt="変更する"></a>
					<!-- <a href="#" class="link-tab-1b"><img src="img/front/link-tab-3b.png" alt="キャンセル"/></a> -->
				</div>
			</div>
		</div>
	</div>
</div>