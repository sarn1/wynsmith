<?php
/*
Template Name: Half-Width
*/
get_header(); ?>
<section>
  <div id="content_body">
    <div class="row">
      <div class="medium-6 columns">
        <?php
        //get the page id to determine exception pages
        $page_id = get_the_ID();

        if ($page_id == 28) {
          //company video page
          dynamic_sidebar('Company_Video');
        } elseif ($page_id == 18) {
          //mortgage page
          ?>
          <!-- http://www.mortgagecalculator.org/free-tools/ -->
          <form method="post" action="http://www.mortgagecalculator.org" target="_blank">
            <input type="hidden" name="param[action]" value="calculate">
            <input type="hidden" name="mortgage-calculator-plus" value="2b0b2e2f885a8e63c88ab2efb3775a11">
            <table cellpadding="0" cellspacing="0" width="100%" align="center">
              <tr>
                <td id="params" valign="top">
                  <table cellpadding="3" cellspacing="0" width="100%">
                    <tr>
                      <th colspan="2" align="center"><a href="http://www.mortgagecalculator.org"><img
                            src="http://www.mortgagecalculator.org/images/mortgage-calculator-logo2.png"
                            alt="MortgageCalculator" height="19" width="200" border="0"></a>
                      </th>
                    </tr>
                    <tr>
                      <td align="right">Home Value: $</td>
                      <td><input type="text" name="param[homevalue]" value="300,000" size="10"></td>
                    </tr>
                    <tr>
                      <td align="right">Loan Amount: $</td>
                      <td><input type="text" name="param[principal]" value="250,000" size="10"></td>
                    </tr>
                    <tr>
                      <td align="right">Interest Rate %:</td>
                      <td><input type="text" name="param[interest_rate]" value="5.0" size="4"></td>
                    </tr>
                    <tr>
                      <td align="right">Loan Term (In Years):</td>
                      <td><input type="text" name="param[term]" value="30" size="4"></td>
                    </tr>
                    <tr>
                      <td align="right">Start date:</td>
                      <td><select name="param[start_month]" id="p_start_month">
                          <option label="Jan" value="1">Jan</option>
                          <option label="Feb" value="2">Feb</option>
                          <option label="Mar" value="3">Mar</option>
                          <option label="Apr" value="4">Apr</option>
                          <option label="May" value="5">May</option>
                          <option label="Jun" value="6">Jun</option>
                          <option label="Jul" value="7">Jul</option>
                          <option label="Aug" value="8">Aug</option>
                          <option label="Sep" value="9">Sep</option>
                          <option label="Oct" value="10">Oct</option>
                          <option label="Nov" value="11">Nov</option>
                          <option label="Dec" value="12">Dec</option>
                        </select>
                        <select name="param[start_year]" id="p_start_year">
                          <option label="2012" value="2012">2012</option>
                          <option label="2013" value="2013">2013</option>
                          <option label="2014" value="2014">2014</option>
                          <option label="2015" value="2015">2015</option>
                          <option label="2016" value="2016">2016</option>
                          <option label="2017" value="2017">2017</option>
                          <option label="2018" value="2018">2018</option>
                          <option label="2019" value="2019">2019</option>
                          <option label="2020" value="2020">2020</option>
                          <option label="2021" value="2021">2021</option>
                          <option label="2022" value="2022">2022</option>
                          <option label="2023" value="2023">2023</option>
                          <option label="2024" value="2024">2024</option>
                          <option label="2025" value="2025">2025</option>
                          <option label="2026" value="2026">2026</option>
                          <option label="2027" value="2027">2027</option>
                          <option label="2028" value="2028">2028</option>
                          <option label="2029" value="2029">2029</option>
                          <option label="2030" value="2030">2030</option>
                        </select>
                      </td>
                    </tr>
                    <script>
                      var timestamp = new Date();
                      try {
                        document.getElementById("p_start_month").selectedIndex = +timestamp.getMonth();
                        document.getElementById("p_start_year").selectedIndex = +timestamp.getFullYear() - 2010;
                      } catch (_) {
                      }
                    </script>
                    <tr>
                      <td align="right">Property Tax %:</td>
                      <td><input type="text" name="param[property_tax]" value="1.25" size="4"></td>
                    </tr>
                    <tr>
                      <td align="right">PMI %:</td>
                      <td><input type="text" name="param[pmi]" value="0.5" size="4"></td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center" id="calculate_btn"><input type="submit" value="Calculate"></td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </form>
          <?php
        } elseif (has_post_thumbnail()) {
          the_post_thumbnail();
        }
        ?>
      </div>
      <div class="medium-6 columns">
        <?php if (have_posts()) :
          while (have_posts()) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <article><?php the_content(); ?></article>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>