<taconite>
	<replaceContent select=".main">
		<div class="content">
			<table class="table">
				<tr>
					<td colspan="2"><br /><br />
						<span class="header">Just a few questions to cover the technicalities...</span>
					</td>
				</tr>
			</table>
			
			<?php
			echo $form->create();
			echo $form->input('doctor_id', array('type' => 'hidden', 'default' => $details['doctor_id']));
			echo $form->input('user_id', array('type' => 'hidden', 'default' => $details['user_id']));
			echo $form->input('doctor_detail_id', array('type' => 'hidden', 'default' => $details['doctor_detail_id']));
			echo $form->input('date_time', array('type' => 'hidden', 'default' => date('Y-m-d H:i', $details['date'])));
			echo $form->input('type', array('type' => 'hidden', 'default' => $details['type']));
			?>
			<table class="table">
				<tr>
					<td>
						<br /><br />You are requesting an appointment (<?php echo $details['type']; ?> visit) with Dr. <?php echo $details['name']; ?> at <?php echo $details['location']; ?> on <?php echo date('l', $details['date']), ', ', date('j F Y', $details['date']) ?> at <?php echo date('g:i a', $details['date']) ?>.
						<br /><br />
						<?php echo $form->input('emergency', array('div' => false, 'label' => false, 'before' => 'Is this an emergency? ')); ?>
					</td>
				</tr>				
				<tr>
					<td>
						<br />What is the reason for this appointment? <i>Optional</i>
					</td>
				</tr>
				
				<tr>
					<td>
						<?php echo $form->input('reason', array('div' => false, 'label' => false, 'rows' => 3, 'cols' => 70)); ?>
					</td>
				</tr>
				
				<tr>
					<td>
						<br />Is there anything else you would us to know? <i>Optional</i>
					</td>
				</tr>
				
				<tr>
					<td>
						<?php echo $form->input('notes', array('div' => false, 'label' => false, 'rows' => 3, 'cols' => 70)); ?>
					</td>
				</tr>
				
				<tr>
					<td>
						<br /><b>Get confirmations via:</b>
					</td>
				</tr>
				
				<tr>
					<td>
						<?php
						echo $form->input('phone_confirmations', array('div' => false, 'label' => false, 'before' => 'Phone  '));
						echo $form->input('sms_confirmations', array('div' => false, 'label' => false, 'before' => '  SMS '));
						echo $form->input('email_confirmations', array('div' => false, 'label' => false, 'before' => '  Email '));
						?>
					</td>
				</tr>
				
				<tr>
					<td>
						<br /><br /><b>Get reminders via:</b>
					</td>
				</tr>
				
				<tr>
					<td>
						<?php
						echo $form->input('phone_reminders', array('div' => false, 'label' => false, 'before' => 'Phone  '));
						echo $form->input('sms_reminders', array('div' => false, 'label' => false, 'before' => '  SMS '));
						echo $form->input('email_reminders', array('div' => false, 'label' => false, 'before' => '  Email '));
						?>
					</td>
				</tr>
					
				
			</table>

			<br /><br />
					<div id="legalAgreement">					
						<span style="font-size:150%">MediConnect Legal Agreement &amp; Terms of Use</span>
						<span style="font-size:120%"><br />Updated June 2009</span>
						<span style="font-size:120%"><br />Revision 1A</span>
						<br />
						<br />
						Welcome to the MediConnect website "Site" provided by MediConnect Pakistan, "we" or "MediConnect". This Limited License
						and User Agreement "User Agreement" constitutes a binding agreement
						between you and MediConnect, and governs your access to and use of this Site and
						the data, information, profiles, materials and other content available on or through
						this Site, including without limitation MediConnect' information databases "Databases" and the MediConnect
						rating system (collectively, the "Site Materials". Please read this User
						Agreement carefully before using this Site or any Site Materials. By accessing or
						using this Site or any Site Materials, you automatically agree to be bound by the
						terms of this User Agreement. If you do not agree to be bound by the terms of this
						User Agreement, do not continue using our Site.<br /> 
						<br /> 
						We reserve the right, at our sole discretion, to change this User Agreement from
						time to time. Your continued use of this Site or any Site Materials after such changes
						take effect will be deemed to constitute your acceptance of and agreement to the
						new User Agreement.
						<br /> 
						<br /> 
						PLEASE READ THIS AGREEMENT CAREFULLY BEFORE ACCESSING, USING OR BROWSING THIS SITE
						OR ANY SITE MATERIALS. BY CLICKING ON "I AGREE," OR BY ACCESSING, USING
						OR BROWSING THIS SITE OR ANY SITE MATERIALS, YOU, ON BEHALF OF YOURSELF OR YOUR
						ENTITY, AS APPLICABLE, ACKNOWLEDGE AND CONFIRM THAT: (1) YOU HAVE READ AND UNDERSTAND
						ALL OF THE TERMS AND CONDITIONS OF THIS USER AGREEMENT; (2) YOU AGREE TO BE BOUND
						BY ALL OF THE TERMS AND CONDITIONS OF THIS USER AGREEMENT AND ACKNOWLEDGE THAT THIS
						USER AGREEMENT IS THE LEGAL EQUIVALENT OF A SIGNED, WRITTEN CONTRACT BETWEEN YOU
						AND MEDICONNECT; AND (3) IF ACCESSING, USING OR BROWSING THIS SITE ON BEHALF OF
						AN ENTITY, YOU HAVE FULL AUTHORITY TO BIND YOUR ENTITY TO ALL OF THE TERMS AND CONDITIONS
						OF THIS USER AGREEMENT. IF YOU ARE NOT WILLING TO BE BOUND BY ALL OF THE TERMS AND
						CONDITIONS OF THIS AGREEMENT, INCLUDING WITHOUT LIMITATION THE PRECEDING ACKNOWLEDGEMENT
						AND AGREEMENT, DO NOT SELECT THE 'I AGREE' BUTTON ASSOCIATED WITH THIS USER AGREEMENT,
						AND DO NOT CONTINUE TO USE OUR SITE, AND MEDICONNECT DOES NOT AND WILL NOT GRANT
						YOU ANY RIGHT OR LICENSE TO ACCESS, USE OR BROWSE THIS SITE OR THE SITE MATERIALS.
						<br /> 
						<br /> 
						<b>1. Nature of Service and Limited License</b> 
						<br /> 
						<br /> 
						MediConnect provides information about hospitals, physicians, long-term
						care facilities, and other providers of healthcare services (collectively, "Healthcare
						Providers" based on data and information obtained from Healthcare Providers and user feedback.
						This data is is not adjusted or audited by MediConnect.
						<br /> 
						<br /> 
						<b>2. No Recommendations or Medical Advice</b> 
						<br /> 
						<br /> 
						MediConnect is not a referral service and does not recommend or endorse any particular
						Healthcare Provider. Rather, MediConnect is only an intermediary that provides
						selected information about Healthcare Providers. We do not offer advice regarding
						the quality or suitability of any particular Healthcare Provider for specific treatments
						or health conditions, and no information on this Site should be construed as health
						or medical advice. The Healthcare Provider rating information consists of statements
						of opinion and not statements of fact or recommendations to utilize the services
						of any specific Healthcare Provider. You should obtain any additional information
						necessary to make an informed decision prior to utilizing any specific Healthcare
						Provider.
						<br /> 
						<br /> 
						You assume all responsibility in connection with choosing any Healthcare Provider,
						whether or not you obtained information about such Healthcare Provider on or through
						this Site. MediConnect and its licensors, suppliers and affiliates (collectively,
						the "Affiliates", and the directors, officers, agents, and representatives
						of each, assume no (and hereby disclaims all) responsibility or liability of any
						kind, for any advice, treatment or other services rendered by any Healthcare Provider,
						or for any malpractice claims and other claims that may arise directly or indirectly
						from any such advice, treatment or other services.
						<br /> 
						<br /> 
						<b>3. Proprietary Rights; Confidentiality</b><br /> 
						<br /> 
						Except as explicitly provided in this User Agreement, all right, title and interest
						in and to the Site Materials, including without limitation the graphical display
						of this Site and all Healthcare Provider ratings, and all intellectual property
						rights embodied therein, are the property of MediConnect or our Affiliates. The
						Site Materials and the Databases are protected by law, including, but not limited
						to, international copyright law and trademark law, trade secret
						law, as well as other state, federal, and international laws and regulations. MediConnect
						does not claim any rights in unaltered government data.<br /> 
						<br /> 
						The Healthcare Provider rating information contained in the Databases constitute
						confidential and valuable proprietary compilations owned by MediConnect. You will
						protect the confidentiality of (and not disclose to any person) the Healthcare Provider
						rating information contained in the Databases, for three (3) years from the date
						you accessed such information, by using at least the same degree of care as you
						use to protect your own confidential information, but no less than a reasonable
						degree of care. Your disclosure of information contained in the Databases pursuant
						to a judicial or administrative order will not be deemed to be a breach of this
						User Agreement, provided you (a) provide timely written notice of such order to
						MediConnect and (b) reasonably cooperate with MediConnect efforts to contest or
						limit the scope of such order. Any breach of the foregoing confidentiality obligation
						will cause MediConnect irreparable harm for which there is no adequate legal remedy.
						In the event of any actual or threatened breach of this Agreement, MediConnect
						will be entitled to obtain injunctive and all other appropriate relief from a court
						of competent authority, without being required to: (i) show any actual damage or
						irreparable harm, (ii) prove the inadequacy of its legal remedies, or (iii) post
						any bond or other security.<br /> 
						<br /> 
						The Star rating system and methodology, and ratings of individual providers,
						are the property of MediConnect and may not be reproduced, distributed, or otherwise
						used in any manner without our prior written permission. MediConnect, MediConnect.pk,
						and the MediConnect logo are service
						marks and trademarks of MediConnect Pakistan and may not be used in any manner (including,
						but not limited to, in connection with re-publication or citation of the Healthcare
						Provider ratings) without the prior written permission of MediConnect Pakistan. Other
						names and logos contained in this Site or in the Site Materials are trademarks and
						service marks of third parties and may not be used without the permission of the
						trademark or service mark owner.
						<br /> 
						<br /> 
						Except as expressly permitted in this User Agreement or otherwise permitted by us
						in writing, you will not copy, reproduce, modify, adapt, translate, distribute,
						transmit, download, upload, post, sell, rent, license, transfer, disclose, publicly
						perform, publicly display, mirror, frame, create derivative works of, reverse engineer,
						decompile or disassemble, or use any aspect of this Site or any Site Materials (including,
						but not limited to, any Health Care Provider rankings), in whole or in part, in
						any form or by any means. Without limiting the foregoing, except as expressly permitted
						by us in writing, you will not, directly or indirectly, use any of the Databases
						or the information contained therein: (i) for any purposes other than your personal,
						non-commercial evaluation of Heath Care Providers; (ii) to compile mailing lists
						or other lists of Healthcare Providers for commercial purposes; (iii) to establish
						independent data files or compendiums of statistical information; or (iv) in violation
						of any applicable laws or regulations. Please send an e-mail to info@mediconnect.pk
						to receive additional information about the possibility of alternative arrangements
						regarding the Databases. Further, you may not use any metatags or any other "hidden
						text" utilizing the name "MediConnect Pakistan" without our prior written
						permission. Any unauthorized use, disclosure or reproduction of any Site Materials
						may violate copyright laws, trademark laws, trade secret laws, laws pertaining to
						privacy and publicity rights, or other laws or regulations. Please be aware that
						we actively and aggressively enforce our intellectual property rights to the fullest
						extent of the law.
						<br /> 
						<br /> 
						<b>4. Use of this Site, the Site Materials and the Databases</b> 
						<br /> 
						<br /> 
						Except as expressly permitted by us in writing, your right to access and use the
						Site Materials is limited solely to a revocable, nonexclusive, non-transferable
						license to access and view this Site and the Site Materials, and to copy, download,
						store and/or print only a single copy of any Site Materials, solely for your non-commercial,
						personal use and not for resale, disclosure or distribution to anyone else. With
						respect to any permitted copy of the Site Materials, you will reproduce and include
						all copyright, confidentiality and other proprietary notices included in such Site
						Materials on any such copy. The license granted to you in this User Agreement is
						expressly conditioned on your continued compliance with this User Agreement, as
						it may be amended from time to time by MediConnect in our sole discretion.
						<br /> 
						<br /> 
						<b>5. Password Maintenance and Responsibility</b> 
						<br /> 
						<br /> 
						If you wish to access certain areas of this Site or the Site Materials available
						on or through certain areas of this Site, you must choose a password during your
						completion of this Site's registration process. By registering, you represent, warrant
						and covenant that: (i) you are at least 18 years of age; (ii) you are using your
						actual identity; (iii) you have provided only true, accurate, current and complete
						information about yourself during the registration process; and (iv) you will maintain
						and promptly update the information that you provide to keep it true, accurate,
						current and complete. You may update your information at any time by logging into
						the Site and clicking on "Account Log In."
						<br /> 
						<br /> 
						By logging onto this Site using any password, you represent, warrant and covenant
						that you are authorized to use such password and to engage in the activities that
						you conduct thereunder. You are solely responsible for the confidentiality and use
						of your password, as well as for any activities conducted on or through this Site
						using your password. If you wish to cancel a password, or if you become aware of
						any loss, theft or unauthorized use of a password, please notify us immediately.
						We reserve the right to delete or change any password at any time and for any reason.
						<br /> 
						<br /> 
						<b>6. Term and Termination</b> 
						<br /> 
						<br /> 
						This User Agreement will take effect at the time you click "I Agree" or
						access, use or browse this Site or any Site Materials. We reserve the right, at
						any time and for any reason, without notice to you, (i) to deny you access to this
						Site, any Site Materials, or any portion thereof; (ii) to change, remove or discontinue
						the Site or any portion thereof, or any of the Site Materials or services available
						on or through this Site; or (iii) to terminate this User Agreement.
						<br /> 
						<br /> 
						<b>7. Our Privacy Policy</b> 
						<br /> 
						<br /> 
						We consider the protection of our users' personal data to be important. Therefore,
						we have adopted a Privacy
						Policy outlining our personal data collection and use practices. Please
						refer to it for details about how we collect and use personal information from users
						of this Site. By agreeing to the terms of this User Agreement, you are automatically
						agreeing to our Privacy Policy, which is incorporated herein.
						<br /> 
						<br /> 
						<b>8. Links to Other Sites</b> 
						<br /> 
						<br /> 
						This Site may contain links to other sites on the World Wide Web for the convenience
						of our users. These other sites have not been reviewed by us and are maintained
						by third parties over which we exercise no control. Accordingly, we expressly disclaim
						any responsibility for the content, policies and practices of these other sites
						and for the availability, accuracy, reliability, completeness, currency, quality,
						performance or suitability of the information, products and services available or
						advertised on or through these other sites. Moreover, these links do not imply,
						directly or indirectly, our endorsement of or affiliation with any other site or
						site owner, or any information, products or services provided by any third party.
						When leaving this Site, you should be aware that our terms and policies may no longer
						govern, and, therefore, you should review the applicable terms and policies of each
						linked site.
						<br /> 
						<br /> 
						<b>9. Third Party Content and Privacy Information Delivered to Third Parties</b><br /> 
						<br /> 
						Some of the Site Materials, including but not limited to, certain healthcare information,
						product reviews, news, data, research, analysis and opinions, are provided by third parties.
						We make no representations with respect to, nor do we guarantee or endorse the availability,
						accuracy, reliability, completeness, currency, quality, performance, suitability,
						or correct sequencing of any information, materials or other content provided by
						any of the third parties. We do not endorse, oppose or edit any opinion or analysis expressed
						by any of the third parties. We assume no responsibility or liability for any information,
						materials or other content provided by any of the IIPs. Moreover, any private information
						you deliver to third parties accessed through a link at the Site will be held subject
						to the privacy policies of that third party, and not MediConnect.
						<br /> 
						<br /> 
						<b>10. Permission to Use Your Submissions</b> 
						<br /> 
						<br /> 
						Any and all information (other than information given in connection with registration,
						which shall be treated as set forth in other provisions of this User Agreement),
						suggestions, feedback, ideas, concepts, comments, illustrations and other materials
						that you disclose or offer to us on or in connection with this Site or any Site
						Materials "Submissions" are submitted without any restrictions or expectation
						of confidentiality. You hereby assign to us without compensation or further obligation,
						all rights now known or hereafter existing to use, allow others to use, or assign
						the right to use, the Submissions. You further agree that your Submissions may be
						used without restriction for any purpose whatsoever, commercial or otherwise, without
						compensation to you, including the right to use, reproduce, modify, adapt, publish,
						transmit, publicly perform or display, translate, create derivative works from,
						or otherwise communicate to the public the Submissions on this Site or elsewhere
						by us, our assigns or others we have allowed to use your Submissions. You will not
						assert any proprietary right or moral right of any kind with respect to any Submissions.
						<br /> 
						<br /> 
						<b>11. Confidentiality on the Internet</b> 
						<br /> 
						<br /> 
						Use of the Internet is solely at your own risk and is subject to all applicable
						local, state, federal, and international laws and regulations. While we have endeavored
						to create a secure and reliable site, please be advised that the confidentiality
						of any communication or material transmitted to us over the Internet cannot be guaranteed.
						Consequently, neither we nor our Affiliates are responsible for the security of
						any information transmitted via the Internet, the accuracy of the information contained
						on this Site, or for the consequences of any reliance on such information. You must
						make your own determination as to these matters.<br /> 
						<br /> 
						<b>12. Electronic Communications with MediConnect</b> 
						<br /> 
						<br /> 
						Should you elect to send or receive e-mail communications of any kind to or from
						MediConnect, you represent and warrant to MediConnect that your e-mail service
						has appropriate and adequate security systems necessary to prevent unauthorized
						access to outbound or inbound e-mail transmissions. You further agree that the content
						(including any Site Materials) in any e-mail or other electronic communication you
						receive from MediConnect is subject to the provisions of this User Agreement.<br /> 
						<br /> 
						<b>13. Site Monitoring</b> 
						<br /> 
						<br /> 
						We reserve the right to view, monitor and record activity on this Site without notice
						to or permission from you. We may disclose any records, electronic communications,
						information, materials or other content of any kind (i) if we believe in good faith
						that the law or legal process requires it; (ii) if such disclosure is necessary
						or appropriate to operate this Site; or (iii) to protect our rights or property
						or the rights or property of our users and business partners. However, we are not
						responsible for screening, policing, editing or monitoring this Site.
						<br /> 
						<br /> 
						We are committed to complying with copyright and related laws, and expect all users
						of this Site to comply with such laws as well. Using this Site to transmit any content
						or to engage in any activity that infringes any copyright or any other right of
						a third party violates this User Agreement. You represent and warrant to MediConnect
						that you own, or are otherwise lawfully authorized to use, any information, materials
						or other content that you transmit to or through this Site, and that the use of
						the same does not violate copyright or related laws and will not cause injury to
						any person or entity.
						<br /> 
						<br /> 
						If notified of an allegation that this Site contains infringing, defamatory, damaging,
						illegal or offensive records, electronic communications, information, materials
						or other content, we may, but have no obligation to, investigate the allegation
						and determine in our sole discretion whether to remove or request the removal of
						the same from this Site. Notices to us regarding any alleged copyright infringement
						on this Site should be directed to MediConnect at the following e-mail address:
						info@MediConnect.com.<br /> 
						<br /> 
						<b>14. Events Beyond Our Control</b> 
						<br /> 
						<br /> 
						You absolve and release us and our Affiliates from any claim of harm resulting from
						any cause(s) over which we or they do not have direct control, including, but not
						limited to, failure of electronic or mechanical equipment or communication lines,
						telephone or other interconnect problems, computer viruses or other damaging code
						or data, unauthorized access, theft, operator errors, severe weather, earthquakes,
						natural disasters, strikes or other labor problems, wars, or governmental restrictions,
						and disclosure of your private health information that you have provided to third
						parties through links on our web site.
						<br /> 
						<br /> 
						<b>15. Disclaimers</b> 
						<br /> 
						<br /> 
						THIS SITE AND THE SITE MATERIALS ARE PROVIDED ON AN "AS IS" AND "AS
						AVAILABLE" BASIS, AND ARE INTENDED FOR INFORMATIONAL PURPOSES ONLY. WHILE WE
						ENDEAVOR TO PROVIDE THE MOST ACCURATE, UP TO DATE INFORMATION AVAILABLE, THE SITE
						MATERIALS AND DATABASES MAY CONTAIN TECHNICAL OR OTHER INACCURACIES OR TYPOGRAPHICAL
						ERRORS, AND MAY BE CHANGED OR UPDATED WITHOUT NOTICE.
						<br /> 
						<br /> 
						TO THE FULLEST EXTENT PERMISSIBLE PURSUANT TO APPLICABLE LAW, WE DISCLAIM ALL WARRANTIES
						OF ANY KIND, EITHER EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO: (I) ANY WARRANTIES
						CONCERNING THE AVAILABILITY, ACCURACY, RELIABILITY, COMPLETENESS, CURRENCY, QUALITY,
						PERFORMANCE OR SUITABILITY OF THIS SITE, THE SITE MATERIALS, OR ANY PRODUCTS, SERVICES
						OR RESULTS OBTAINED ON OR THROUGH THIS SITE; AND (II) ANY IMPLIED WARRANTIES OF
						TITLE, NON-INFRINGEMENT, MERCHANTABILITY OR FITNESS FOR A PARTICULAR PURPOSE. WE
						MAKE NO REPRESENTATIONS OR WARRANTIES OF ANY KIND, EXPRESS OR IMPLIED, THAT THIS
						SITE OR ANY SITE MATERIALS WILL ASSIST YOU IN IDENTIFYING A SUITABLE HEALTHCARE
						PROVIDER OR FOR ANY OTHER PURPOSE. WE DO NOT REPRESENT OR WARRANT THAT THIS SITE
						WILL BE UNINTERRUPTED, ERROR-FREE, OR FREE OF VIRUSES OR OTHER HARMFUL COMPONENTS,
						OR THAT DEFECTS, IF ANY, WILL BE CORRECTED. YOU EXPRESSLY AGREE THAT YOUR USE OF
						THIS SITE AND THE SITE MATERIALS IS ENTIRELY AT YOUR OWN RISK.
						<br /> 
						<br /> 
						FURTHER, WE EXPRESSLY DISCLAIM ANY AND ALL RESPONSIBILITY AND LIABILITY WITH RESPECT
						TO SEPARATE AGREEMENTS YOU MAY MAKE WITH HEALTHCARE PROVIDERS OR WITH THIRD PARTIES
						WHO OFFER PRODUCTS OR SERVICES ON OR THROUGH THIS SITE, AND YOU WILL LOOK SOLELY
						TO SUCH HEALTHCARE PROVIDERS AND THIRD PARTIES WITH RESPECT TO ANY AND ALL CLAIMS
						ARISING OUT OF SUCH AGREEMENTS AND/OR SUCH PRODUCTS OR SERVICES.
						<br /> 
						<br /> 
						<b>16. Limitations of Liability</b> 
						<br /> 
						<br /> 
						NEITHER WE NOR OUR AFFILIATES WILL BE LIABLE FOR ANY DAMAGES RESULTING FROM YOUR
						USE OF, OR RELIANCE UPON, THIS SITE, ANY SITE MATERIALS, OR ANY PRODUCTS OR SERVICES
						OBTAINED ON OR THROUGH THIS SITE. IN THE EVENT OF ANY PROBLEM WITH THIS SITE, ANY
						SITE MATERIALS, OR ANY PRODUCTS OR SERVICES OBTAINED ON OR THROUGH THIS SITE, YOUR
						SOLE REMEDY IS TO CEASE USING SUCH ITEM(S).
						<br /> 
						<br /> 
						UNDER NO CIRCUMSTANCES WILL WE OR OUR AFFILIATES, OR ANY OF OUR OR THEIR RESPECTIVE
						DIRECTORS, OFFICERS, SHAREHOLDERS, PROPRIETORS, PARTNERS, EMPLOYEES, AGENTS, REPRESENTATIVES,
						SERVANTS, ATTORNEYS, PREDECESSORS, SUCCESSORS OR ASSIGNS, BE LIABLE FOR ANY INDIRECT,
						INCIDENTAL, SPECIAL, PUNITIVE, EXEMPLARY OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT
						NOT LIMITED TO, LOST PROFITS AND DAMAGES THAT RESULT FROM INCONVENIENCE, DELAY,
						OR LOSS OF USE) ARISING OUT OF USE OF THIS SITE, ANY SITE MATERIALS, ARRANGEMENTS
						MADE BASED ON INFORMATION OBTAINED ON OR THROUGH THIS SITE, OR PRODUCTS OR SERVICES
						OBTAINED ON OR THROUGH THIS SITE, EVEN IF WE OR THEY HAVE BEEN ADVISED OF THE POSSIBILITY
						OF SUCH DAMAGES. Because some states do not allow the exclusion or limitation of
						liability for consequential or incidental damages, this limitation may not apply
						to you.
						<br /> 
						<br /> 
						<b>17. Indemnity</b> 
						<br /> 
						<br /> 
						You will defend, indemnify, and hold harmless MediConnect and our Affiliates, and
						our and their respective directors, officers, shareholders, proprietors, partners,
						employees, agents, representatives, servants, attorneys, predecessors, successors
						and assigns, from and against any and all claims, proceedings, damages, injuries,
						liabilities, losses, costs and expenses (including reasonable attorneys' fees and
						litigation expenses), relating to or arising from (i) your use of this Site, any
						Site Materials, or any products or services obtained on or through this Site, (ii)
						any arrangements you make based on information obtained on or through this Site,
						or (iii) any breach by you of this User Agreement.
											
						<br /> 
						<br /> 
						<b>18. Notices</b> 
						<br /> 
						<br /> 
						All notices to you will be sent to the e-mail address that you provide to us when
						you register. Such notice will be deemed given one business day after the e-mail
						is sent. Except as expressly stated otherwise, all notices to us must be sent to
						info@mediconnect.pk or write to us at
						<br />
						<br />
						E-138 Block 7 <br />
						Gulshan-e-Iqbal <br />
						Karachi, Pakistan <br />
						<br /> 
						<br /> 
						<b>19. Miscellaneous</b> 
						<br /> 
						<br /> 
						The following provisions will survive the termination of this User Agreement: 2,
						3, 8 through 11, and 13 through 19. Failure to insist on strict performance of any
						provisions of this User Agreement will not operate as a waiver of any subsequent
						default or failure of performance. No waiver of any provision of this User Agreement
						will be valid unless in writing and acknowledged in writing or electronically by
						both parties. If any portion of this User Agreement is adjudged invalid or unenforceable
						by a court of competent jurisdiction, the remaining portions will remain valid,
						enforceable, and in effect, and the parties will promptly substitute for the invalid
						provision an enforceable provision which resembles the invalid provision as closely
						as possible in intent and economic effect. No joint venture, partnership, employment
						or agency relationship exists between you and MediConnect as a result of this User
						Agreement or your use of this Site or any Site Materials. Any rights not expressly
						granted herein are reserved by MediConnect. This User Agreement constitutes the
						entire agreement between you and MediConnect with respect to your use of this Site
						and the Site Materials, and supersedes any and all prior understandings or agreements
						between you and MediConnect, whether written or oral. You acknowledge that, in
						providing you access to and use of this Site and the Site Materials, we have relied
						on your acceptance of this User Agreement.<br /> 
						<br /> 
						<b>20. Contacting MediConnect</b><br /> 
						<br /> 
						If you have any questions about this User Agreement, the Site, or if you would otherwise
						like to contact MediConnect, you can do so by sending an e-mail to info@mediconnect.pk
						or writing to us at:<br /> 
						<br /> 
						E-138 Block 7 <br />
						Gulshan-e-Iqbal <br />
						Karachi, Pakistan <br />
						<br /><br /> 

					</div>
			
			<div style="margin-left:auto; margin-right:auto; width:200px; text-align: center">	
				<br />
				I Agree <input type="checkbox" id="agree" /><br />
				<?php echo $form->submit('Create appointment', array('div' => false, 'id' => 'submitButton')); ?>
			</div>
		<?php echo $form->end(); ?>
		</div>
	</replaceContent>
	
	<remove select=".midThird" />
	
	<eval><![CDATA[
		$('#DoctorBookingAddForm').ajaxForm();
		$('#submitButton').attr('disabled', true);
		
		$('#agree').change(function() {
			$('#submitButton').attr('disabled', !$(this).attr('checked'));
		});
	]]></eval>
	
</taconite>