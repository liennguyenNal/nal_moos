<?php




$i=0;
$rows = array();

foreach($users as $user){

  $rows[$i]['ID']= $user['User']['id'];
  $rows[$i]['申込人_e-mail']= $user['User']['email'];
  $rows[$i]['手続き状況']= $user['Status']['name'];
  $rows[$i]['申込人_姓']= $user['User']['first_name'];
  $rows[$i]['申込人_名']= $user['User']['last_name'];
  $rows[$i]['申込人_セイ']= $user['User']['first_name_kana'];
  $rows[$i]['申込人_メイ']= $user['User']['last_name_kana'];
  if($user['User']['gender']=='male'){$rows[$i]['申込人_性別']='男性';}else{$rows[$i]['申込人_性別']='女性';}
  if($user['User']["year_of_birth"] and $user['User']["month_of_birth"] and $user['User']["day_of_birth"]){$rows[$i]['申込人_生年月日']= $user['User']["year_of_birth"].'/'.$user['User']["month_of_birth"].'/'.$user['User']["day_of_birth"];}else{$rows[$i]['申込人_生年月日']='';}
  
  $rows[$i]['申込人_年齢']= $user['User']['age_of_birth'];
  $rows[$i]['申込人_婚姻']= $user['MarriedStatus']['name'];
  if($user['User']['live_with_family']=='1'){$rows[$i]['申込人_同居家族']='同居';}else{$rows[$i]['申込人_同居家族']='別居';}
  
  $rows[$i]['申込人_子供']= $user['User']['num_child'];
  if($user['UserAddress']['post_num_1'] and $user['UserAddress']['post_num_2']){$rows[$i]['申込人_郵便番号']= $user['UserAddress']['post_num_1'].'-'.$user['UserAddress']['post_num_2'];}else{$rows[$i]['申込人_郵便番号']='';}
  
  $rows[$i]['申込人_都道府県']= $user['UserAddress']['Pref']['name'];
  $rows[$i]['申込人_市区町村']= $user['UserAddress']['city'];
  $rows[$i]['申込人_番地']= $user['UserAddress']['address'];
  $rows[$i]['申込人_建物']= $user['UserAddress']['house_name'];
  $rows[$i]['申込人_居住形態']= $user['UserAddress']['Residence']['name'];
  $rows[$i]['申込人_居住年数']= $user['UserAddress']['year_residence'];
  $rows[$i]['申込人_家賃']= $user['UserAddress']['housing_costs'];
  $rows[$i]['申込人_携帯電話']= $user['User']['phone'];
  $rows[$i]['申込人_自宅']= $user['User']['home_phone'];
  if($user['User']['contact_type']==1){$rows[$i]['申込人_日中連絡先']='携帯電話';} else if($user['User']['contact_type']==2){$rows[$i]['申込人_日中連絡先']='自宅電話';}else if($user['User']['contact_type']==3){$rows[$i]['申込人_日中連絡先']='勤務先';} else{$rows[$i]['申込人_日中連絡先']='';}
  
  $rows[$i]['申込人_職業']= $user['UserCompany']['Work']['name'];
  $rows[$i]['申込人_会社名']= $user['UserCompany']['name'];
  $rows[$i]['申込人_会社名カナ']= $user['UserCompany']['name_kana'];
  if($user['UserCompany']['post_num_1'] and $user['UserCompany']['post_num_2']){$rows[$i]['申込人_勤務先郵便番号']= $user['UserCompany']['post_num_1'].'-'.$user['UserCompany']['post_num_2'];}else{$rows[$i]['申込人_勤務先郵便番号']='';}
  
  $rows[$i]['申込人_勤務先都道府県']= $user['UserCompany']['Pref']['name'];
  $rows[$i]['申込人_勤務先市区町村']= $user['UserCompany']['city'];
  $rows[$i]['申込人_勤務先番地']= $user['UserCompany']['address'];
  $rows[$i]['申込人_勤務先建物']= $user['UserCompany']['house_name'];
  $rows[$i]['申込人_勤務先電話']= $user['UserCompany']['phone'];
  $rows[$i]['申込人_勤務先FAX']= $user['UserCompany']['fax'];
  $rows[$i]['申込人_業界']= $user['UserCompany']['Career']['name'];
  $rows[$i]['申込人_仕事内容']= $user['UserCompany']['description'];
  $rows[$i]['申込人_部署']= $user['UserCompany']['department'];
  $rows[$i]['申込人_役職']= $user['UserCompany']['position'];
  $rows[$i]['申込人_勤続年数']= $user['UserCompany']['year_worked'];
  $rows[$i]['申込人_勤続月数']= $user['UserCompany']['month_worked'];
  if($user['User']['salary_type']==1){$rows[$i]['申込人_給与形態']= '固定給';} else if($user['User']['salary_type']==2){$rows[$i]['申込人_給与形態']= '一部歩合制';}else if($user['User']['salary_type']==3){$rows[$i]['申込人_給与形態']= '完全歩合制';}else if($user['User']['salary_type']==4){$rows[$i]['申込人_給与形態']= 'その他';} else{$rows[$i]['申込人_給与形態']='';}
  
  $rows[$i]['申込人_給与その他']= $user['UserCompany']['salary_type_other'];
  $rows[$i]['申込人_税込年収']= $user['UserCompany']['salary_year'];
  $rows[$i]['申込人_税込月収']= $user['UserCompany']['salary_month'];
  if($user['UserCompany']['salary_receive_id']==1){$rows[$i]['申込人_給料日']= '日払い';} else if($user['UserCompany']['salary_receive_id']==2){$rows[$i]['申込人_給料日']= '週払い';}else if($user['UserCompany']['salary_receive_id']==3){$rows[$i]['申込人_給料日']= '月払い';}else if($user['UserCompany']['salary_receive_id']==4){$rows[$i]['申込人_給料日']= '毎月';} else{$rows[$i]['申込人_給料日']='';}
  
  $rows[$i]['申込人_給料日付']= $user['UserCompany']['salary_date'];
  $rows[$i]['申込人_健康保険']= $user['UserCompany']['Insurance']['name'];
  $rows[$i]['申込人_職業備考']= $user['UserCompany']['note'];
  $rows[$i]['申込人_借入件数']= $user['User']['debt_count'];
  $rows[$i]['申込人_借入総額']= $user['User']['debt_total_value'];
  $rows[$i]['申込人_月々返済額']= $user['User']['debt_pay_per_month'];
  if($user['ExpectArea'][0]['post_num_1'] and $user['ExpectArea'][0]['post_num_2']){$rows[$i]['申込人_希望郵便番号']= $user['ExpectArea'][0]['post_num_1'].'-'.$user['ExpectArea'][0]['post_num_2'];}else{$rows[$i]['申込人_希望郵便番号']='';}
  
  $rows[$i]['申込人_希望都道府県']= $user['ExpectArea'][0]['Pref']['name'];
  $rows[$i]['申込人_希望市区町村']= $user['ExpectArea'][0]['city'];
  $rows[$i]['申込人_希望地域']= $user['ExpectArea'][0]['address'];
  if($user['ExpectArea'][1]['post_num_1'] and $user['ExpectArea'][1]['post_num_2']){$rows[$i]['申込人_希望郵便番号2']= $user['ExpectArea'][1]['post_num_1'].'-'.$user['ExpectArea'][1]['post_num_2'];}else{$rows[$i]['申込人_希望郵便番号2']='';}

  
  $rows[$i]['申込人_希望都道府県2']= $user['ExpectArea'][1]['Pref']['name'];
  $rows[$i]['申込人_希望市区町村2']= $user['ExpectArea'][1]['city'];
  $rows[$i]['申込人_希望地域2']= $user['ExpectArea'][1]['address'];
  if($user['ExpectArea'][2]['post_num_1'] and $user['ExpectArea'][2]['post_num_2']){$rows[$i]['申込人_希望郵便番号3']= $user['ExpectArea'][2]['post_num_1'].'-'.$user['ExpectArea'][2]['post_num_2'];}else{$rows[$i]['申込人_希望郵便番号3']='';}
  
  $rows[$i]['申込人_希望都道府県3']= $user['ExpectArea'][2]['Pref']['name'];
  $rows[$i]['申込人_希望市区町村3']= $user['ExpectArea'][2]['city'];
  $rows[$i]['申込人_希望地域3']= $user['ExpectArea'][2]['address'];
  if($user['ExpectArea'][3]['post_num_1'] and $user['ExpectArea'][3]['post_num_2']){$rows[$i]['申込人_希望郵便番号4']= $user['ExpectArea'][3]['post_num_1'].'-'.$user['ExpectArea'][3]['post_num_2'];}else{$rows[$i]['申込人_希望郵便番号4']='';}
  
  $rows[$i]['申込人_希望都道府県4']= $user['ExpectArea'][3]['Pref']['name'];
  $rows[$i]['申込人_希望市区町村4']= $user['ExpectArea'][3]['city'];
  $rows[$i]['申込人_希望地域4']= $user['ExpectArea'][3]['address'];
  if($user['ExpectArea'][4]['post_num_1'] and $user['ExpectArea'][4]['post_num_2']){$rows[$i]['申込人_希望郵便番号5']= $user['ExpectArea'][4]['post_num_1'].'-'.$user['ExpectArea'][4]['post_num_2'];}else{$rows[$i]['申込人_希望郵便番号5']='';}
  
  $rows[$i]['申込人_希望都道府県5']= $user['ExpectArea'][4]['Pref']['name'];
  $rows[$i]['申込人_希望市区町村5']= $user['ExpectArea'][4]['city'];
  $rows[$i]['申込人_希望地域5']= $user['ExpectArea'][4]['address'];
  $rows[$i]['配偶者_姓']= $user['UserPartner']['first_name'];
  $rows[$i]['配偶者_名']= $user['UserPartner']['last_name'];
  $rows[$i]['配偶者_セイ']= $user['UserPartner']['first_name_kana'];
  $rows[$i]['配偶者_メイ']= $user['UserPartner']['last_name_kana'];
  if($user['UserPartner']['gender']=='male'){$rows[$i]['配偶者_性別']='男性';}else{$rows[$i]['配偶者_性別']='女性';}
  if($user['UserPartner']["year_of_birth"] and $user['UserPartner']["month_of_birth"] and $user['UserPartner']["day_of_birth"]){$rows[$i]['配偶者_生年月日']= $user['UserPartner']["year_of_birth"].'/'.$user['UserPartner']["month_of_birth"].'/'.$user['UserPartner']["day_of_birth"];}else{$rows[$i]['配偶者_生年月日']='';}
  if($user['UserPartner']["year_of_birth"]){$rows[$i]['配偶者_年齢']= date("Y") - $user['UserPartner']["year_of_birth"];}else{$rows[$i]['配偶者_年齢']='';}
  
  $rows[$i]['配偶者_携帯電話']= $user['UserPartner']['phone'];
  $rows[$i]['配偶者_職業']= $user['UserPartner']['Work']['name'];
  $rows[$i]['配偶者_会社名']= $user['UserPartner']['company'];
  $rows[$i]['配偶者_会社名カナ']= $user['UserPartner']['company_kana'];
  if($user['UserPartner']['company_post_num_1'] and $user['UserPartner']['company_post_num_2']){$rows[$i]['配偶者_勤務先郵便番号']= $user['UserPartner']['company_post_num_1'].'-'.$user['UserPartner']['company_post_num_2'];}else{$rows[$i]['配偶者_勤務先郵便番号']='';}
  
  $rows[$i]['配偶者_勤務先都道府県']= $user['UserPartner']['CompanyPref']['name'];//note
  $rows[$i]['配偶者_勤務先市区町村']= $user['UserPartner']['company_city'];
  $rows[$i]['配偶者_勤務先番地']= $user['UserPartner']['company_address'];
  $rows[$i]['配偶者_勤務先建物']= $user['UserPartner']['company_house_name'];
  $rows[$i]['配偶者_勤務先電話']= $user['UserPartner']['company_phone'];
  $rows[$i]['配偶者_勤務先FAX']= $user['UserPartner']['company_fax'];
  $rows[$i]['配偶者_業界']= $user['UserPartner']['Career']['name'];
  $rows[$i]['配偶者_仕事内容']= $user['UserPartner']['company_job_desc'];
  $rows[$i]['配偶者_所属部署']= $user['UserPartner']['company_department'];
  $rows[$i]['配偶者_役職']= $user['UserPartner']['company_position'];
  $rows[$i]['配偶者_勤続年数']= $user['UserPartner']['year_worked'];
  $rows[$i]['配偶者_勤続月数']= $user['UserPartner']['month_worked'];
  if($user['UserPartner']['salary_type']==1){$rows[$i]['配偶者_給与形態']= '固定給';} else if($user['UserPartner']['salary_type']==2){$rows[$i]['配偶者_給与形態']= '一部歩合制';}else if($user['UserPartner']['salary_type']==3){$rows[$i]['配偶者_給与形態']= '完全歩合制';}else if($user['UserPartner']['salary_type']==4){$rows[$i]['配偶者_給与形態']= 'その他';} else{$rows[$i]['配偶者_給与形態']='';}
  
  $rows[$i]['配偶者_給与その他']= $user['UserPartner']['salary_type_other'];
  $rows[$i]['配偶者_税込年収']= $user['UserPartner']['income_year'];
  $rows[$i]['配偶者_税込月収']= $user['UserPartner']['income_month'];
  if($user['UserPartner']['salary_receive_id']==1){$rows[$i]['配偶者_給料日']= '日払い';} else if($user['UserPartner']['salary_receive_id']==2){$rows[$i]['配偶者_給料日']= '週払い';}else if($user['UserPartner']['salary_receive_id']==3){$rows[$i]['配偶者_給料日']= '月払い';}else if($user['UserPartner']['salary_receive_id']==4){$rows[$i]['配偶者_給料日']= '毎月';} else{$rows[$i]['配偶者_給料日']='';}
  
  $rows[$i]['配偶者_給料日付']= $user['UserPartner']['salary_date'];
  $rows[$i]['配偶者_健康保険']= $user['UserPartner']['Insurance']['name'];
  $rows[$i]['配偶者_備考']= $user['UserPartner']['note'];
  $rows[$i]['同居人_姓']= $user['UserRelation'][0]['first_name'];
  $rows[$i]['同居人_名']= $user['UserRelation'][0]['last_name'];
  $rows[$i]['同居人_セイ']= $user['UserRelation'][0]['first_name_kana'];
  $rows[$i]['同居人_メイ']= $user['UserRelation'][0]['last_name_kana'];
  if($user['UserRelation'][0]['gender']=='male'){$rows[$i]['同居人_性別']='男性';}else{$rows[$i]['同居人_性別']='女性';}

  if($user['UserRelation'][0]["year_of_birth"] and $user['UserRelation'][0]["month_of_birth"] and $user['UserRelation'][0]["day_of_birth"]){$rows[$i]['同居人_生年月日年']= $user['UserRelation'][0]["year_of_birth"].'/'.$user['UserRelation'][0]["month_of_birth"].'/'.$user['UserRelation'][0]["day_of_birth"];}else{$rows[$i]['同居人_生年月日年']='';}
  
  if($user['UserRelation'][0]["year_of_birth"]){$rows[$i]['同居人_年齢']= date("Y") - $user['UserRelation'][0]["year_of_birth"];}else{$rows[$i]['同居人_年齢']='';}
  
  $rows[$i]['同居人_申込人との関係']= $user['UserRelation'][0]['relate'];
  $rows[$i]['同居人_携帯電話']= $user['UserRelation'][0]['phone'];
  $rows[$i]['同居人_会社・学校']= $user['UserRelation'][0]['company'];
  $rows[$i]['同居人_会社・学校カナ']= $user['UserRelation'][0]['school'];
  $rows[$i]['同居人2_姓']= $user['UserRelation'][1]['first_name'];
  $rows[$i]['同居人2_名']= $user['UserRelation'][1]['last_name'];
  $rows[$i]['同居人2_セイ']= $user['UserRelation'][1]['first_name_kana'];
  $rows[$i]['同居人2_メイ']= $user['UserRelation'][1]['last_name_kana'];
  if($user['UserRelation'][1]['gender']=='male'){$rows[$i]['同居人2_性別']='男性';}else{$rows[$i]['同居人2_性別']='女性';}
  if($user['UserRelation'][1]["year_of_birth"] and $user['UserRelation'][1]["month_of_birth"] and $user['UserRelation'][1]["day_of_birth"]){$rows[$i]['同居人2_生年月日年']= $user['UserRelation'][1]["year_of_birth"].'/'.$user['UserRelation'][1]["month_of_birth"].'/'.$user['UserRelation'][1]["day_of_birth"];}else{$rows[$i]['同居人2_生年月日年']='';}

  if($user['UserRelation'][1]["year_of_birth"]){$rows[$i]['同居人2_年齢']= date("Y") - $user['UserRelation'][1]["year_of_birth"];}else{$rows[$i]['同居人2_年齢']='';}
  
  $rows[$i]['同居人2_申込人との関係']= $user['UserRelation'][1]['relate'];
  $rows[$i]['同居人2_携帯電話']= $user['UserRelation'][1]['phone'];
  $rows[$i]['同居人2_会社・学校']= $user['UserRelation'][1]['company'];
  $rows[$i]['同居人2_会社・学校カナ']= $user['UserRelation'][1]['school'];
  $rows[$i]['同居人3_姓']= $user['UserRelation'][2]['first_name'];
  $rows[$i]['同居人3_名']= $user['UserRelation'][2]['last_name'];
  $rows[$i]['同居人3_セイ']= $user['UserRelation'][2]['first_name_kana'];
  $rows[$i]['同居人3_メイ']= $user['UserRelation'][2]['last_name_kana'];
  if($user['UserRelation'][2]['gender']=='male'){$rows[$i]['同居人3_性別']='男性';}else{$rows[$i]['同居人3_性別']='女性';}
  if($user['UserRelation'][2]["year_of_birth"] and $user['UserRelation'][2]["month_of_birth"] and $user['UserRelation'][2]["day_of_birth"]){$rows[$i]['同居人3_生年月日年']= $user['UserRelation'][2]["year_of_birth"].'/'.$user['UserRelation'][2]["month_of_birth"].'/'.$user['UserRelation'][2]["day_of_birth"];}else{$rows[$i]['同居人3_生年月日年']='';}
  
  if($user['UserRelation'][2]["year_of_birth"]){$rows[$i]['同居人3_年齢']= date("Y") - $user['UserRelation'][2]["year_of_birth"];}else{$rows[$i]['同居人3_年齢']='';}
  
  $rows[$i]['同居人3_申込人との関係']= $user['UserRelation'][2]['relate'];
  $rows[$i]['同居人3_携帯電話']= $user['UserRelation'][2]['phone'];
  $rows[$i]['同居人3_会社・学校']= $user['UserRelation'][2]['company'];
  $rows[$i]['同居人3_会社・学校カナ']= $user['UserRelation'][2]['school'];
  $rows[$i]['同居人4_姓']= $user['UserRelation'][3]['first_name'];
  $rows[$i]['同居人4_名']= $user['UserRelation'][3]['last_name'];
  $rows[$i]['同居人4_セイ']= $user['UserRelation'][3]['first_name_kana'];
  $rows[$i]['同居人4_メイ']= $user['UserRelation'][3]['last_name_kana'];
  if($user['UserRelation'][3]['gender']=='male'){$rows[$i]['同居人4_性別']='男性';}else{$rows[$i]['同居人4_性別']='女性';}
   if($user['UserRelation'][3]["year_of_birth"] and $user['UserRelation'][3]["month_of_birth"] and $user['UserRelation'][3]["day_of_birth"]){$rows[$i]['同居人4_生年月日年']= $user['UserRelation'][3]["year_of_birth"].'/'.$user['UserRelation'][3]["month_of_birth"].'/'.$user['UserRelation'][3]["day_of_birth"];}else{$rows[$i]['同居人4_生年月日年']='';}
  
  if($user['UserRelation'][3]["year_of_birth"]){$rows[$i]['同居人4_年齢']= date("Y") - $user['UserRelation'][3]["year_of_birth"];}else{$rows[$i]['同居人4_年齢']='';}
  
  $rows[$i]['同居人4_申込人との関係']= $user['UserRelation'][3]['relate'];
  $rows[$i]['同居人4_携帯電話']= $user['UserRelation'][3]['phone'];
  $rows[$i]['同居人4_会社・学校']= $user['UserRelation'][3]['company'];
  $rows[$i]['同居人4_会社・学校カナ']= $user['UserRelation'][3]['school'];
  $rows[$i]['同居人5_姓']= $user['UserRelation'][4]['first_name'];
  $rows[$i]['同居人5_名']= $user['UserRelation'][4]['last_name'];
  $rows[$i]['同居人5_セイ']= $user['UserRelation'][4]['first_name_kana'];
  $rows[$i]['同居人5_メイ']= $user['UserRelation'][4]['last_name_kana'];
  if($user['UserRelation'][4]['gender']=='male'){$rows[$i]['同居人5_性別']='男性';}else{$rows[$i]['同居人5_性別']='女性';}
  if($user['UserRelation'][4]["year_of_birth"] and $user['UserRelation'][4]["month_of_birth"] and $user['UserRelation'][4]["day_of_birth"]){$rows[$i]['同居人5_生年月日年']= $user['UserRelation'][4]["year_of_birth"].'/'.$user['UserRelation'][4]["month_of_birth"].'/'.$user['UserRelation'][4]["day_of_birth"];}else{$rows[$i]['同居人5_生年月日年']='';}
  
  if($user['UserRelation'][4]["year_of_birth"]){$rows[$i]['同居人5_年齢']= date("Y") - $user['UserRelation'][4]["year_of_birth"];}else{$rows[$i]['同居人5_年齢']='';}
  
  $rows[$i]['同居人5_申込人との関係']= $user['UserRelation'][4]['relate'];
  $rows[$i]['同居人5_携帯電話']= $user['UserRelation'][4]['phone'];
  $rows[$i]['同居人5_会社・学校']= $user['UserRelation'][4]['company'];
  $rows[$i]['同居人5_会社・学校カナ']= $user['UserRelation'][4]['school'];
  $rows[$i]['保証人_姓']= $user['UserGuarantor']['first_name'];
  $rows[$i]['保証人_名']= $user['UserGuarantor']['last_name'];
  $rows[$i]['保証人_セイ']= $user['UserGuarantor']['first_name_kana'];
  $rows[$i]['保証人_メイ']= $user['UserGuarantor']['last_name_kana'];
  if($user['UserGuarantor']['gender']=='male'){$rows[$i]['保証人_性別']='男性';}else{$rows[$i]['保証人_性別']='女性';}

  if($user['UserGuarantor']["year_of_birth"] and $user['UserGuarantor']["month_of_birth"] and $user['UserGuarantor']["day_of_birth"]){$rows[$i]['保証人_生年月日年']= $user['UserGuarantor']["year_of_birth"].'/'.$user['UserGuarantor']["month_of_birth"].'/'.$user['UserGuarantor']["day_of_birth"];}else{$rows[$i]['保証人_生年月日年']='';}
  if($user['UserGuarantor']["year_of_birth"]){$rows[$i]['保証人_年齢']= date("Y") - $user['UserGuarantor']["year_of_birth"];}else{$rows[$i]['保証人_年齢']='';}
  
  $rows[$i]['保証人_婚姻']= $user['UserGuarantor']['MarriedStatus']['name'];
  if($user['UserGuarantor']['live_with_family']=='1'){$rows[$i]['保証人_同居家族']='同居';}else{$rows[$i]['保証人_同居家族']='別居';}
  
  $rows[$i]['保証人_申込人との関係']= $user['UserGuarantor']['num_child'];
  if($user['UserGuarantor']['post_num_1'] and $user['UserGuarantor']['post_num_2']){$rows[$i]['保証人_郵便番号']= $user['UserGuarantor']['post_num_1'].'-'.$user['UserGuarantor']['post_num_2'];}else{$rows[$i]['保証人_郵便番号']='';}
  
  $rows[$i]['保証人_都道府県']= $user['UserGuarantor']['Pref']['name'];
  $rows[$i]['保証人_市区町村']= $user['UserGuarantor']['city'];
  $rows[$i]['保証人_番地']= $user['UserGuarantor']['address'];
  $rows[$i]['保証人_建物']= $user['UserGuarantor']['house_name'];
  $rows[$i]['保証人_居住形態']= $user['UserGuarantor']['Residence']['name'];
  $rows[$i]['保証人_居住年数']= $user['UserGuarantor']['year_residence'];
  $rows[$i]['保証人_携帯電話']= $user['UserGuarantor']['phone'];
  $rows[$i]['保証人_自宅']= $user['UserGuarantor']['home_phone'];
  if($user['UserGuarantor']['contact_type_id']==1){$rows[$i]['保証人_日中連絡先']='携帯電話';} else if($user['UserGuarantor']['contact_type_id']==2){$rows[$i]['保証人_日中連絡先']='自宅電話';}else if($user['UserGuarantor']['contact_type_id']==3){$rows[$i]['保証人_日中連絡先']='勤務先';}else{$rows[$i]['保証人_日中連絡先']='';}
  
  $rows[$i]['保証人_職業']= $user['UserGuarantor']['Work']['name'];
  $rows[$i]['保証人_会社名']= $user['UserGuarantor']['company'];
  $rows[$i]['保証人_会社名カナ']= $user['UserGuarantor']['company_kana'];
  if($user['UserGuarantor']['company_post_num_1'] and $user['UserGuarantor']['company_post_num_2']){$rows[$i]['保証人_勤務先郵便番号']= $user['UserGuarantor']['company_post_num_1'].'-'.$user['UserGuarantor']['company_post_num_2'];}else{$rows[$i]['保証人_勤務先郵便番号']='';}
  
  $rows[$i]['保証人_勤務先都道府県']= $user['UserGuarantor']['CompanyPref']['name'];
  $rows[$i]['保証人_勤務先市区町村']= $user['UserGuarantor']['company_city'];
  $rows[$i]['保証人_勤務先番地']= $user['UserGuarantor']['company_address'];
  $rows[$i]['保証人_勤務先建物']= $user['UserGuarantor']['company_house_name'];
  $rows[$i]['保証人_勤務先電話']= $user['UserGuarantor']['company_phone'];
  $rows[$i]['保証人_勤務先FAX']= $user['UserGuarantor']['company_fax'];
  $rows[$i]['保証人_業界']= $user['UserGuarantor']['Career']['name'];
  $rows[$i]['保証人_仕事内容']= $user['UserGuarantor']['company_job_desc'];
  $rows[$i]['保証人_所属部署']= $user['UserGuarantor']['company_department'];
  $rows[$i]['保証人_役職']= $user['UserGuarantor']['company_position'];
  $rows[$i]['保証人_勤続年数']= $user['UserGuarantor']['year_worked'];
  $rows[$i]['保証人_勤続月数']= $user['UserGuarantor']['month_worked'];
  if($user['UserGuarantor']['salary_type']==1){$rows[$i]['保証人_給与形態']= '固定給';} else if($user['UserGuarantor']['salary_type']==2){$rows[$i]['保証人_給与形態']= '一部歩合制';}else if($user['UserGuarantor']['salary_type']==3){$rows[$i]['保証人_給与形態']= '完全歩合制';}else if($user['UserGuarantor']['salary_type']==4){$rows[$i]['保証人_給与形態']= 'その他';} else{$rows[$i]['保証人_給与形態']='';}
  
  $rows[$i]['保証人_給与形態その他']= $user['UserGuarantor']['salary_type_other'];
  $rows[$i]['保証人_税込年収']= $user['UserGuarantor']['income_year'];
  $rows[$i]['保証人_税込月収']= $user['UserGuarantor']['income_month'];
  if($user['UserGuarantor']['salary_receive_id']==1){$rows[$i]['保証人_給料日']= '日払い';} else if($user['UserGuarantor']['salary_receive_id']==2){$rows[$i]['保証人_給料日']= '週払い';}else if($user['UserGuarantor']['salary_receive_id']==3){$rows[$i]['保証人_給料日']= '月払い';}else if($user['UserGuarantor']['salary_receive_id']==4){$rows[$i]['保証人_給料日']= '毎月';} else{$rows[$i]['保証人_給料日']='';}
  
  $rows[$i]['保証人_給料日付']= $user['UserGuarantor']['salary_date'];
  $rows[$i]['保証人_健康保険']= $user['UserGuarantor']['Insurance']['name'];
  $rows[$i]['保証人_備考']= $user['UserGuarantor']['note'];
  $rows[$i]['保証人2_姓']= $user['OtherGuarantor']['first_name'];
  $rows[$i]['保証人2_名']= $user['OtherGuarantor']['last_name'];
  $rows[$i]['保証人2_セイ']= $user['OtherGuarantor']['first_name_kana'];
  $rows[$i]['保証人2_メイ']= $user['OtherGuarantor']['last_name_kana'];
  if($user['OtherGuarantor']['gender']=='male'){$rows[$i]['保証人2_性別']='男性';}else{$rows[$i]['保証人2_性別']='女性';}

  if($user['OtherGuarantor']["year_of_birth"] and $user['OtherGuarantor']["month_of_birth"] and $user['OtherGuarantor']["day_of_birth"]){$rows[$i]['保証人2_生年月日年']= $user['OtherGuarantor']["year_of_birth"].'/'.$user['OtherGuarantor']["month_of_birth"].'/'.$user['OtherGuarantor']["day_of_birth"];}else{$rows[$i]['保証人2_生年月日年']='';}
  
  if($user['OtherGuarantor']["year_of_birth"]){$rows[$i]['保証人2_年齢']= date("Y") - $user['OtherGuarantor']["year_of_birth"];}else{$rows[$i]['保証人2_年齢']='';}
  
  $rows[$i]['保証人2_婚姻']= $user['OtherGuarantor']['MarriedStatus']['name'];
  if($user['OtherGuarantor']['live_with_family']=='1'){$rows[$i]['保証人2_同居家族']='同居';}else{$rows[$i]['保証人2_同居家族']='別居';}
  
  $rows[$i]['保証人2_申込人との関係']= $user['OtherGuarantor']['num_child'];
  if($user['OtherGuarantor']['post_num_1'] and $user['OtherGuarantor']['post_num_2']){$rows[$i]['保証人2_郵便番号']= $user['OtherGuarantor']['post_num_1'].'-'.$user['OtherGuarantor']['post_num_2'];}else{$rows[$i]['保証人2_郵便番号']='';}
  
  $rows[$i]['保証人2_都道府県']= $user['OtherGuarantor']['Pref']['name'];
  $rows[$i]['保証人2_市区町村']= $user['OtherGuarantor']['city'];
  $rows[$i]['保証人2_番地']= $user['OtherGuarantor']['address'];
  $rows[$i]['保証人2_建物']= $user['OtherGuarantor']['house_name'];
  $rows[$i]['保証人2_居住形態']= $user['OtherGuarantor']['Residence']['name'];
  $rows[$i]['保証人2_居住年数']= $user['OtherGuarantor']['year_residence'];
  $rows[$i]['保証人2_携帯電話']= $user['OtherGuarantor']['phone'];
  $rows[$i]['保証人2_自宅']= $user['OtherGuarantor']['home_phone'];
  if($user['OtherGuarantor']['contact_type_id']==1){$rows[$i]['保証人2_日中連絡先']='携帯電話';} else if($user['OtherGuarantor']['contact_type_id']==2){$rows[$i]['保証人2_日中連絡先']='自宅電話';}else if($user['OtherGuarantor']['contact_type_id']==3){$rows[$i]['保証人2_日中連絡先']='勤務先';} else{$rows[$i]['保証人2_日中連絡先']='';}
  
  $rows[$i]['保証人2_職業']= $user['OtherGuarantor']['Work']['name'];
  $rows[$i]['保証人2_会社名']= $user['OtherGuarantor']['company'];
  $rows[$i]['保証人2_会社名カナ']= $user['OtherGuarantor']['company_kana'];
  if($user['OtherGuarantor']['company_post_num_1'] and $user['OtherGuarantor']['company_post_num_2']){$rows[$i]['保証人2_勤務先郵便番号']= $user['OtherGuarantor']['company_post_num_1'].'-'.$user['OtherGuarantor']['company_post_num_2'];}else{$rows[$i]['保証人2_勤務先郵便番号']='';}
  
  $rows[$i]['保証人2_勤務先都道府県']= $user['OtherGuarantor']['CompanyPref']['name'];
  $rows[$i]['保証人2_勤務先市区町村']= $user['OtherGuarantor']['company_city'];
  $rows[$i]['保証人2_勤務先番地']= $user['OtherGuarantor']['company_address'];
  $rows[$i]['保証人2_勤務先建物']= $user['OtherGuarantor']['company_house_name'];
  $rows[$i]['保証人2_勤務先電話']= $user['OtherGuarantor']['company_phone'];
  $rows[$i]['保証人2_勤務先FAX']= $user['OtherGuarantor']['company_fax'];
  $rows[$i]['保証人2_業界']= $user['OtherGuarantor']['Career']['name'];
  $rows[$i]['保証人2_仕事内容']= $user['OtherGuarantor']['company_job_desc'];
  $rows[$i]['保証人2_所属部署']= $user['OtherGuarantor']['company_department'];
  $rows[$i]['保証人2_役職']= $user['OtherGuarantor']['company_position'];
  $rows[$i]['保証人2_勤続年数']= $user['OtherGuarantor']['year_worked'];
  $rows[$i]['保証人2_勤続月数']= $user['OtherGuarantor']['month_worked'];
  if($user['OtherGuarantor']['salary_type']==1){$rows[$i]['保証人2_給与形態']= '固定給';} else if($user['OtherGuarantor']['salary_type']==2){$rows[$i]['保証人2_給与形態']= '一部歩合制';}else if($user['OtherGuarantor']['salary_type']==3){$rows[$i]['保証人2_給与形態']= '完全歩合制';}else if($user['OtherGuarantor']['salary_type']==4){$rows[$i]['保証人2_給与形態']= 'その他';} else{$rows[$i]['保証人2_給与形態']='';}

  
  $rows[$i]['保証人2_給与形態その他']= $user['OtherGuarantor']['salary_type_other'];
  $rows[$i]['保証人2_税込年収']= $user['OtherGuarantor']['income_year'];
  $rows[$i]['保証人2_税込月収']= $user['OtherGuarantor']['income_month'];
  $rows[$i]['保証人2_給料日']= $user['OtherGuarantor']['salary_date'];
  if($user['OtherGuarantor']['salary_receive_id']==1){$rows[$i]['保証人2_給料日付']= '日払い';} else if($user['OtherGuarantor']['salary_receive_id']==2){$rows[$i]['保証人2_給料日付']= '週払い';}else if($user['OtherGuarantor']['salary_receive_id']==3){$rows[$i]['保証人2_給料日付']= '月払い';}else if($user['OtherGuarantor']['salary_receive_id']==4){$rows[$i]['保証人2_給料日付']= '毎月';} else{$rows[$i]['保証人2_給料日付']='';}
  
  $rows[$i]['保証人2_健康保険']= $user['OtherGuarantor']['Insurance']['name'];
  $rows[$i]['保証人2_備考']= $user['OtherGuarantor']['note'];
  $rows[$i]['会員申込日']=$user['User']['created'];
  $rows[$i]['会員登録承認日']=$user['User']['approved_register_date'];
  $rows[$i]['審査申請日']=$user['User']['updated_date'];
  $rows[$i]['審査承認日']=$user['User']['approved_date'];
  $rows[$i]['保証金確認日']=$user['User']['payment_date'];






if($i==0){
  $this->CSV->addRow(array_keys($rows[0]));
  
}

    $this->CSV->addRow($rows[$i]);



  //$this->CSV->addRow($row[$i]);
  $i++;
}

//var_dump($rows); die;
 $filename='users';
 echo  $this->CSV->render($filename);
?>