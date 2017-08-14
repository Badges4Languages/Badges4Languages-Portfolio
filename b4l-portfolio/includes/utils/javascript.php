<?php wp_enqueue_script("jquery"); ?>
<script>

jQuery( document ).ready(function() {
    setInterval(function(){
			var A1 = false;
			var A2 = false;
			var B1 = false;
			var B2 = false;
			var C1 = false;
			var C2 = false;
      var T1 = false;
			var T2 = false;
			var T3 = false;
			var T4 = false;
			var T5 = false;
			var T6 = false;
			var default_result = true;

      var student_badge_start = '<center><img src="../../wp-content/plugins/b4l-portfolio/images/badges/student_levels/';
      var teacher_badge_start = '<center><img src="../../wp-content/plugins/b4l-portfolio/images/badges/teacher_levels/';
      var badge_end = '.png" width="100px" height="100px" /></center>';


			/// Checking if A1 is activated
			if(
						document.getElementById("li1").checked &&
			   		document.getElementById("re1").checked &&
			   		document.getElementById("si1").checked &&
			   		document.getElementById("sp1").checked &&
			   		document.getElementById("wr1").checked
			){
			  A1 = true;
				default_result = false;
				jQuery("#result").html(student_badge_start+'A1'+badge_end);
			}


			/// Checking if A2 is activated
			if(A1 &&
				   	document.getElementById("li2").checked &&
			   		document.getElementById("re2").checked &&
			   		document.getElementById("si2").checked &&
			   		document.getElementById("sp2").checked &&
			   		document.getElementById("wr2").checked
      ){
				A2 = true;
				jQuery("#result").html(student_badge_start+'A2'+badge_end);
			}

			/// Checking if B1 is activated
			if(A2 &&
				   	document.getElementById("li3").checked &&
			   		document.getElementById("re3").checked &&
			   		document.getElementById("si3").checked &&
			   		document.getElementById("sp3").checked &&
			   		document.getElementById("wr3").checked ){
				B1 = true;
				jQuery("#result").html(student_badge_start+'B1'+badge_end);
			}

			/// Checking if B2 is activated
			if(B1 &&
				   	document.getElementById("li4").checked &&
			   		document.getElementById("re4").checked &&
			   		document.getElementById("si4").checked &&
			   		document.getElementById("sp4").checked &&
			   		document.getElementById("wr4").checked ){
				B2 = true;
				jQuery("#result").html(student_badge_start+'B2'+badge_end);
			}


			/// Checking if C1 is activated
			if(B2 &&
				   	document.getElementById("li5").checked &&
			   		document.getElementById("re5").checked &&
			   		document.getElementById("si5").checked &&
			   		document.getElementById("sp5").checked &&
			   		document.getElementById("wr5").checked
      ){
				C1 = true;
				jQuery("#result").html(student_badge_start+'C1'+badge_end);
			}


			/// Checking if C2 is activated
			if(C1 &&
				   	document.getElementById("li6").checked &&
			   		document.getElementById("re6").checked &&
			   		document.getElementById("si6").checked &&
			   		document.getElementById("sp6").checked &&
			   		document.getElementById("wr6").checked ){
				C2 = true;
				jQuery("#result").html(student_badge_start+'C2'+badge_end);
			}

      /// Checking if T1 is activated
			/// Print the result if only T1 is active
			if(		document.getElementById("lp1").checked &&
			   		document.getElementById("la1").checked &&
			   		document.getElementById("ltq1").checked &&
			   		document.getElementById("ltp1").checked &&
			   		document.getElementById("te1").checked &&
			   		document.getElementById("mks1").checked &&
			   		document.getElementById("lcp1").checked &&
			   		document.getElementById("imm1").checked &&
			   		document.getElementById("ast1").checked &&
			   		document.getElementById("td1").checked &&
			   		document.getElementById("dm1").checked
      ){
			  T1 = true;
				default_result = false;
				jQuery("#result").html(teacher_badge_start+'T1'+badge_end);
			}


			/// Checking if T2 is activated
			/// Print the result if only T1 and T2 are active
			if(T1 &&
				   	document.getElementById("lp2").checked &&
			   		document.getElementById("la2").checked &&
			   		document.getElementById("ltq2").checked &&
			   		document.getElementById("ltp2").checked &&
			   		document.getElementById("te2").checked &&
			   		document.getElementById("mks2").checked &&
			   		document.getElementById("lcp2").checked &&
			   		document.getElementById("imm2").checked &&
			   		document.getElementById("ast2").checked &&
			   		document.getElementById("td2").checked &&
			   		document.getElementById("dm2").checked
      ){
				T2 = true;
				jQuery("#result").html(teacher_badge_start+'T2'+badge_end);
			}

			/// Checking if T3 is activated
			/// Print the result if only T1, T2 and T3 are active
			if(T2 &&
				   	document.getElementById("lp3").checked &&
			   		document.getElementById("la3").checked &&
			   		document.getElementById("ltq3").checked &&
			   		document.getElementById("ltp3").checked &&
			   		document.getElementById("te3").checked &&
			   		document.getElementById("mks3").checked &&
			   		document.getElementById("lcp3").checked &&
			   		document.getElementById("imm3").checked &&
			   		document.getElementById("ast3").checked &&
			   		document.getElementById("td3").checked &&
			   		document.getElementById("dm3").checked
      ){
				T3 = true;
				jQuery("#result").html(teacher_badge_start+'T3'+badge_end);
			}

			/// Checking if T4 is activated
			/// Print the result if only T1, T2, T3 and T4 are active
			if(T3 &&
				   	document.getElementById("lp4").checked &&
			   		document.getElementById("la4").checked &&
			   		document.getElementById("ltq4").checked &&
			   		document.getElementById("ltp4").checked &&
			   		document.getElementById("te4").checked &&
			   		document.getElementById("mks4").checked &&
			   		document.getElementById("lcp4").checked &&
			   		document.getElementById("imm4").checked &&
			   		document.getElementById("ast4").checked &&
			   		document.getElementById("td4").checked &&
			   		document.getElementById("dm4").checked
      ){
				T4 = true;
				jQuery("#result").html(teacher_badge_start+'T4'+badge_end);
			}


			/// Checking if T5 is activated
			/// Print the result if only T1, T2, T3, T4 and T5 are active
			if(T4 &&
				   	document.getElementById("lp5").checked &&
			   		document.getElementById("la5").checked &&
			   		document.getElementById("ltq5").checked &&
			   		document.getElementById("ltp5").checked &&
			   		document.getElementById("te5").checked &&
			   		document.getElementById("mks5").checked &&
			   		document.getElementById("lcp5").checked &&
			   		document.getElementById("imm5").checked &&
			   		document.getElementById("ast5").checked &&
			   		document.getElementById("td5").checked &&
			   		document.getElementById("dm5").checked
      ){
				T5 = true;
				jQuery("#result").html(teacher_badge_start+'T5'+badge_end);
			}


			/// Checking if T6 is activated
			/// Print the result if only T1, T2, T3, T4, T5 and T6 are active
			if(T5 &&
				   	document.getElementById("lp6").checked &&
			   		document.getElementById("la6").checked &&
			   		document.getElementById("ltq6").checked &&
			   		document.getElementById("ltp6").checked &&
			   		document.getElementById("te6").checked &&
			   		document.getElementById("mks6").checked &&
			   		document.getElementById("lcp6").checked &&
			   		document.getElementById("imm6").checked &&
			   		document.getElementById("ast6").checked &&
			   		document.getElementById("td6").checked &&
			   		document.getElementById("dm6").checked
      ){
				T6 = true;
				jQuery("#result").html(teacher_badge_start+'T6'+badge_end);
			}

			if(default_result){
				jQuery("#result").html("");
			}

		}, 100);
});

</script>
