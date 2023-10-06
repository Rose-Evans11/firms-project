@extends('layouts.master_farmer_landing')
@section('title','Insurance Program')
@section('content')
<div class='container-fluid'style="padding:80px">
  <div id="demo" class="carousel slide" data-bs-ride="carousel" style="padding-left:80px; padding-right:80px; padding-bottom: 80pxp">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="5"></button>
    </div>
    
    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('Images/img_rice.png') }}" alt="Rice Crops Insurance" class="img-fluid" style="width:100%; height:auto">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('Images/img_corn.png') }}" alt="Corn Crops Insurance" class="img-fluid" style="width:100%; height:auto">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('Images/img_hvc.png') }}" alt="High Value Crops Insurance" class="img-fluid" style="width:100%; height:auto">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('Images/img_assets.png') }}" alt="Non-Agricultural Assets" class="img-fluid" style="width:100%; height:auto">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('Images/img_aqua.png') }}" alt="Fisheries/Aquaculture" class="img-fluid" style="width:100%; height:auto">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('Images/img_ls.png') }}" alt="Livestock" class="img-fluid" style="width:100%; height:auto">
      </div>
    </div>
    
    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
  <div class="container-fluid">
    <br/>
    <h2> <b> Insurance Program </b> </h2>
    <hr style="border-width:5px"/>
  <!-- Rice Crops Content -->
    <div class="row" style="padding-top: 20px">
      <div class="col-md-6" >
        <img src="{{ asset('Images/img_rice.png') }}" alt="Rice Crops Insurance" class="img-fluid" style="width:600px; height:auto">
      </div>
      <div class="col-md-6 ">
        <h3> Rice Crops Insurance  </h3> 
        <br/>
        The object of this insurance is standing rice crop on the farmland that was specified on the insurance application and in which farmer has insurable interest.  All rice varieties accredited for production by the National Seed Industry Council or endorsed by the Municipal Agriculturist. 
        <div style="padding-top:20px">
          <center> <a href="#" class="btn btn-success btn-ms mt-1" data-bs-toggle="modal" data-bs-target="#rice"> Read More </a><br /></center> 
        </div>
        <!-- Button trigger modal -->

        <!-- Modal for Rice Crops Insurance, this will allow farmers to view more detailed information about the insurance.-->
        <div class="modal fade" id="rice" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ricelabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ricelabel">Rice Crops Insurance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <img src="{{ asset('Images/img_rice.png') }}" alt="Rice Crops Insurance" class="img-fluid" style="width:600px; height:auto">
                <br/>
                <br/>
                <h6> <b> AMOUNT OF COVER </b></h6>
                  Cost of production inputs per Farm Plan and Budget (FPB). The farmer can also choose to have an additional amount of cover of up to 20% of the FPB to cover portion of the value of the expected yield, but this should not exceed the following cover ceilings per hectare:
                  <br/>
                  <br/>
                <table class="table table-bordered">
                    <tr>
                      <th> Inbred Varities</th>
                      <th> Maximum Cover Ceiling</th>
                    </tr>
                    <tr>
                      <td> Irrigated/Rainfed</td>
                      <td> PhP 41,000</td>
                    </tr>
                    <tr>
                      <td> Seed Production</td>
                      <td> PhP 50,000</td>
                    </tr>
                </table>
                <table class="table table-bordered">
                  <tr>
                    <th> Hybrid Varities </th>
                    <th> </th>
                  </tr>
                  <tr>
                    <td> Commercial Production (F1)</td>
                    <td> PhP 50,000</td>
                  </tr>
                  <tr>
                    <td> Seed Production (A X R)</td>
                    <td> PhP 120,000</td>
                  </tr>
                </table>
                <h6><b> TYPES OF INSURANCE COVER </b></h6>
                  <b>Multi-Risk Cover </b> - This is a comprehensive coverage against crop loss caused by natural disasters (i.e. typhoon, flood, drought, earthquake, volcanic eruption, tornado, and hails/hailstorm); as well as plant diseases (e.g. tungro, rice blast/neck rot, grassy stunt, bacterial leaf blight, and sheath blight); and infestation by any of the following major pests: rats, locusts, army worms/cut worms, stem borers, rice bug/rice grain bugs, black bugs and brown plant hoppers/hopper burns. 
                  <b>Natural Disaster Cover </b> - Covers crop losses caused by natural disasters.
                <h6><b> PERIOD OF COVER </b></h6>
                  The insurance coverage shall be from direct seeding or upon transplanting up to harvesting, provided that insurance coverage shall commence from the date of issuance of the Certificate of Insurance Cover (CIC), or from the emergence of seed growth (coleoptiles), if direct seeded or upon transplanting, whichever is later. 
                  <br/>
                  <br/>
                <h6><b> FARM ELIGIBILITY </b></h6>
                  Farm must: Not be part of a riverbed, lakebed, marshland, shoreline or riverbank;
                  <ul>
                    <li> Have an effective irrigation and drainage systems. Rainfed farms are eligible during the wet cropping season subject to a planting cutoff date;</li>
                    <li> Be accessible to regular means of transportation, other commonly available modes of transportation in or around the vicinity, and/or electronically by means of technology; </li>
                    <li> Be suitable for production purposes in accordance with the recommended Good Agricultural Practices (GAP)/Package of Technology (POT) (e.g., right zinc content); and </li>
                    <li> Farm location must have a generally stable peace and order condition and not hazardous to health</li>
                  </ul>
                  <br/>
                  <br/>
                <h6><b> REQUIRED DOCUMENTS FOR INDIVIDUAL BORROWING/SELF FINANCED FARMER </b></h6>
                  <ul>
                    <li> Application for Crop Insurance (PCIC ProForma Individual Application)
                    <li> This should contain the basic information about the farmer, the farm (e.g., planting/harvest schedules, farm location, farm size, variety planted, boundaries), and other details of coverage.</li>
                    <li> FPB </li>
                  </ul>
                <h6><b> WHEN TO FILE AN APPLICATION </b></h6>
                  For Self-financed farmers - any day before the date of direct seeding or transplanting up to thirty (30) calendar days after direct seeding or transplanting, provided that:
                  <ul>
                    <li> No risk insured against has occurred; • Farms meet eligibility requirements;</li>
                    <li> There is no imminent occurrence of calamities and disasters or pest/ disease outbreak. </li>
                    <li>For borrowing farmers - upon filing of loan application.</li>
                  </ul>
                <h6><b> NOTICE OF DEVIATION </b></h6>
                  In case there are deviations from the Farm Plan and Budget, or Application for Crop Insurance, the assured farmer should file a Notice of Deviation to the RO/PEO within ten (10) calendar days from the actual planting date. A deviation can be a change in any of the following: 
                  <ul>
                    <li>  date of direct seeding/transplanting; </li>
                    <li> seed variety;</li>
                    <li> method of planting;</li>
                    <li> size of actual area planted; and</li>
                    <li> farm location. </li>
                  </ul>
                <h6><b> CLAIM FOR INDEMNITY </b></h6>   
                  In the event of loss arising from risks insured against (such as typhoon, flood, earthquake, volcanic eruption, hail/hailstorm or tornado), a Claim for Indemnity (CI) shall be sent to the PCIC RO or PEO within twenty (20) calendar days from occurrence of loss, and before the scheduled date of harvest, provided that where the loss was caused by any risk insured against where the onset of damage is gradual and the full extent thereof is not immediately apparent and determinable, said claim for indemnity shall be filed upon the discovery of loss or damage, but should be filed not later than 20 calendar days before the expected date of harvest.
                  <br/>
                  <br/>
                <h6><b> CLAIM ADJUSTMENT AND SETTLEMENT </b></h6> 
                  Under a regular insurance claims situation, (wherein a widespread calamity did not occur) claims adjustment and verification shall be conducted, as far as practicable, by two (2) PCIC authorized insurance adjusters. If there is, however, an insufficient number of adjusters, one insurance adjuster may validly conduct the claims adjustment and verification. For group crop insurance, a member of the cooperative shall become a third member of the team of adjusters.
                  <br/>
                  <br/>
                <b> Loss Categories: </b>  
                  <ul>
                    <li> Total Loss - if loss is 90% and above.</li>
                    <li> Partial Loss - if loss is more than 10% and below 90%. </li>
                    <li> No Loss - if loss is 10% or less. </li>
                  </ul>
                <b> Amount of Indemnity </b> - shall be based on:
                    <ul>
                      <li> Stage of cultivation at the time of the loss; Actual CPI applied or CPI per the FPB applied at the time of loss, whichever is lower; </li>
                      <li> Percentage of yield loss, and </li>
                      <li> Amount of Cover. </li>
                    </ul>
                <h6><b> SETTLEMENT OF CLAIM </b></h6>   
                  Shall be done as quickly as possible, but not later than twenty (20) working days from the receipt of CI.
                  <br/>
                  <br/>
                <h6><b> NO-CLAIM BENEFIT </b></h6> 
                  The assured is entitled to a no-claim benefit of 10% of his/her aggregated net premiums paid during the immediately preceding three (3) insured crop seasons if he/she has not filed any claim for the said crop seasons.   
                  <br/>
                  <br/>
                
                <h6><b> DEATH BENEFIT </b></h6>
                  This is a built-in benefit regardless of the amount of cover. This is equivalent to PhP10,000 per assured farmer who died within the term of coverage, provided, he/she is not more than eighty (80) years old at the inception of the insurance.
                  <br/>
                  <br/>
                  Source:<a href="https://pcic.gov.ph/insurance-products-2/"> https://pcic.gov.ph/insurance-products-2/</a>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    </div>
    <br/>
    <br/>
    <br/>
    <br/>
  <!-- Corn Crops Content -->
    <div class="row" style="padding-top: 20px"> 
      <div class="col-md-6" >
        <img src="{{ asset('Images/img_corn.png') }}" alt="Corn Crops Insurance" class="img-fluid" style="width:600px; height:auto">
      </div>
      <div class="col-md-6 ">
        <h3> Corn Crops Insurance  </h3> 
        <br/>
        <p>Cost of production inputs per Farm Plan and Budget (FPB). The farmer can also choose to have an additional amount of cover of up to 20% of the FPB to cover portion of the value of the expected yield.</p>
        <div style="padding-top: 20px">
          <center> <a href="#" class="btn btn-success btn-ms mt-1" data-bs-toggle="modal" data-bs-target="#corn"> Read More </a><br /></center>           
        </div>
        <!-- Button trigger modal -->
        <!-- Modal for Corn Crops Insurance, this will allow farmers to view more detailed information about the insurance.-->
        <div class="modal fade" id="corn" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cornlabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="cornlabel">Corn Crops Insurance</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <img src="{{ asset('Images/img_corn.png') }}" alt="Corn Crops Insurance" class="img-fluid" style="width:600px; height:auto">
              <br/>
              <br/>
              <h6> <b> AMOUNT OF COVER </b></h6>
                Cost of production inputs per Farm Plan and Budget (FPB). The farmer can also choose to have an additional amount of cover of up to 20% of the FPB to cover portion of the value of the expected yield, but this should not exceed the following cover ceilings per hectare:
                <br/>
                <br/>
              <table class="table table-bordered">
                  <tr>
                    <th>  Varities</th>
                    <th> Maximum Cover Ceiling</th>
                  </tr>
                  <tr>
                    <td> Corn Production</td>
                    <td> </td>
                  </tr>
                  <tr>
                    <td>Hybrid</td>
                    <td>PhP 50,000 </td>
                  </tr>
                  <tr>
                    <td> Open Pollinated</td>
                    <td> PhP 34,000 </td>
                  </tr>
                  <tr>
                    <td> Corn Seed Production</td>
                    <td> </td>
                  </tr>
                  <tr>
                    <td>Hybrid</td>
                    <td> PhP 76,000 </td>
                  </tr><tr>
                    <td> Open-Pollinated</td>
                    <td> PhP 68,000</td>
                  </tr>
              </table>
              <h6><b> TYPES OF INSURANCE COVER </b></h6>
                <b>Multi-Risk Cover </b> - This is a comprehensive coverage against crop loss caused by natural disasters (i.e. typhoon, flood, drought, earthquake, volcanic eruption, tornado, and hails/hailstorm); as well as plant diseases (e.g. tungro, rice blast/neck rot, grassy stunt, bacterial leaf blight, and sheath blight); and infestation by any of the following major pests: rats, locusts, army worms/cut worms, stem borers, rice bug/rice grain bugs, black bugs and brown plant hoppers/hopper burns. 
                <b>Natural Disaster Cover </b> - Covers crop losses caused by natural disasters.
              <h6><b> PERIOD OF COVER </b></h6>
                The insurance coverage shall be from direct seeding or upon transplanting up to harvesting, provided that insurance coverage shall commence from the date of issuance of the Certificate of Insurance Cover (CIC), or from the emergence of seed growth (coleoptiles), if direct seeded or upon transplanting, whichever is later. 
                <br/>
                <br/>
              <h6><b> FARM ELIGIBILITY </b></h6>
                <ul>
                  <li> Farmer or group of farmers who has obtained production loans from a lending institution which is participating in the governmentsupervised corn production program and credit programs sponsored by governmentowned and controlled corporations (GOCCs), financial institutions (FIs), non-government organizations (NGOs) and local government units (LGUs). </li>
                  <li> Any self-financed farmer/farmer organization (FO)/ people’s organization (PO) or group of farmers who agrees to place himself/ themselves under the technical supervision of an Agricultural Production Technician (APT), or Agricultural Extension Worker (AEW).</li>
                  <li> FO or PO or group of farmers duly qualified under the PCIC rules and regulations.</li>
                </ul>
                <br/>
                <br/>
              <h6><b> REQUIRED DOCUMENTS FOR INDIVIDUAL BORROWING/SELF FINANCED FARMER </b></h6>
                <ul>
                  <li> Application for Crop Insurance (PCIC ProForma Individual Application)
                  <li> This should contain the basic information about the farmer, the farm (e.g., planting/harvest schedules, farm location, farm size, variety planted, boundaries), and other details of coverage.</li>
                  <li> FPB </li>
                </ul>
              <h6><b> WHEN TO FILE AN APPLICATION </b></h6>
                For Self-financed farmers - any day before the date of direct seeding or transplanting up to thirty (30) calendar days after direct seeding or transplanting, provided that:
                <ul>
                  <li> No risk insured against has occurred; • Farms meet eligibility requirements;</li>
                  <li> There is no imminent occurrence of calamities and disasters or pest/ disease outbreak. </li>
                  <li>For borrowing farmers - upon filing of loan application.</li>
                </ul>
              <h6><b> NOTICE OF DEVIATION </b></h6>
                In case there are deviations from the Farm Plan and Budget, or Application for Crop Insurance, the assured farmer should file a Notice of Deviation to the RO/PEO within ten (10) calendar days from the actual planting date. A deviation can be a change in any of the following: 
                <ul>
                  <li>  date of direct seeding/transplanting; </li>
                  <li> seed variety;</li>
                  <li> method of planting;</li>
                  <li> size of actual area planted; and</li>
                  <li> farm location. </li>
                </ul>
              <h6><b> CLAIM FOR INDEMNITY </b></h6>   
                In the event of loss arising from risks insured against (such as typhoon, flood, earthquake, volcanic eruption, hail/hailstorm or tornado), a Claim for Indemnity (CI) shall be sent to the PCIC RO or PEO within twenty (20) calendar days from occurrence of loss, and before the scheduled date of harvest, provided that where the loss was caused by any risk insured against where the onset of damage is gradual and the full extent thereof is not immediately apparent and determinable, said claim for indemnity shall be filed upon the discovery of loss or damage, but should be filed not later than 20 calendar days before the expected date of harvest.
                <br/>
                <br/>
              <h6><b> CLAIM ADJUSTMENT AND SETTLEMENT </b></h6> 
                Under a regular insurance claims situation, (wherein a widespread calamity did not occur) claims adjustment and verification shall be conducted, as far as practicable, by two (2) PCIC authorized insurance adjusters. If there is, however, an insufficient number of adjusters, one insurance adjuster may validly conduct the claims adjustment and verification. For group crop insurance, a member of the cooperative shall become a third member of the team of adjusters.
                <br/>
                <br/>
              <b> Loss Categories: </b>  
                <ul>
                  <li> Total Loss - if loss is 90% and above.</li>
                  <li> Partial Loss - if loss is more than 10% and below 90%. </li>
                  <li> No Loss - if loss is 10% or less. </li>
                </ul>
              <b> Amount of Indemnity </b> - shall be based on:
                  <ul>
                    <li> Stage of cultivation at the time of the loss; Actual CPI applied or CPI per the FPB applied at the time of loss, whichever is lower; </li>
                    <li> Percentage of yield loss, and </li>
                    <li> Amount of Cover. </li>
                  </ul>
              <h6><b> SETTLEMENT OF CLAIM </b></h6>   
                Shall be done as quickly as possible, but not later than twenty (20) working days from the receipt of CI.
                <br/>
                <br/>
              <h6><b> NO-CLAIM BENEFIT </b></h6> 
                The assured is entitled to a no-claim benefit of 10% of his/her aggregated net premiums paid during the immediately preceding three (3) insured crop seasons if he/she has not filed any claim for the said crop seasons.   
                <br/>
                <br/>
              
              <h6><b> DEATH BENEFIT </b></h6>
                This is a built-in benefit regardless of the amount of cover. This is equivalent to PhP10,000 per assured farmer who died within the term of coverage, provided, he/she is not more than eighty (80) years old at the inception of the insurance.
                <br/>
                <br/>
                Source:<a href="https://pcic.gov.ph/insurance-products-2/"> https://pcic.gov.ph/insurance-products-2/</a>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
        </div>
      </div>
      
   </div>
  <!-- HVC Crops Content -->
      <div class="row" style="padding-top: 20px">
        <div class="col-md-6" >
          <img src="{{ asset('Images/img_hvc.png') }}" alt="High Value Crops Insurance" class="img-fluid" style="width:600px; height:auto">
        </div>
        <div class="col-md-6 ">
          <h3> High Value Crops Insurance  </h3> 
          <br/>
          Standing high-value crop planted/grown on the farmland specified on the insurance application and in which the farmer/grower has insurable interest.
          <br/>
          <div style="padding-top:20px">
            <center> <a href="#" class="btn btn-success btn-ms mt-1" data-bs-toggle="modal" data-bs-target="#hvc"> Read More </a><br /></center> 
          </div>
          <!-- Button trigger modal -->

          <!-- Modal for Rice Crops Insurance, this will allow farmers to view more detailed information about the insurance.-->
          <div class="modal fade" id="hvc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hvclabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="hvclabel">High Value Crops Insurance</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <img src="{{ asset('Images/img_hvc.png') }}" alt="Rice Crops Insurance" class="img-fluid" style="width:600px; height:auto">
                  <br/>
                  <br/>
                  <h6> <b> High Value Crops Covered </b></h6>
                    Abaca, adlai/Job’s tears, ampalaya, anahaw, anthurium, asparagus, avocado, Baguio beans/green beans, bamboo, banana, black pepper, breadfruit, broccoli, buri, cabbage, cacao, cacao nursery seedlings, calamansi tree, carrot, cashew tree, cassava, castor bean, cauliflower, chrysanthemum, celery, chayote, chico, chinese melon, citronella, coconut, coffee, cotton, cucumber, dragon fruit, durian, eggplant, falcata, garlic, gerbera, ginger, gladioli, gmelina, guava, guyabano, honeydew, hot chili/hot pepper, jackfruit, jathropa, kangkong/water spinach, lanzones, lauan/shorea, lemon tree, lettuce, mahogany, mango fruit, mangosteen, mango tree, marang, melon, mungbeans, mushroom, mustasa, napier grass, nipa palm, oil palm, okra, onion - red, white, & yellow, orange tree, pakchoi, papaya, patani, patola, peanut, pechay - native & Chinese, pili tree, pineapple, pomelo, potato, purple yam or ube, radish, rambutan, rose, rubber tree, saluyot/red jute, santol, sesame/linga, shallot, sorghum, soybeans, squash, star apple, strawberry, string beans/pole sitao, sugarcane, sunflower, sweet peas, sweet potato, sweet/hot/bell pepper, sweet corn, taro, tiger grass, tobacco, tomato, turmeric, upo/bottle gourd, watermelon, winged bean, white potato, yacon, yam bean/turnips,and zucchini.
                  <h6> <b> AMOUNT OF COVER </b></h6>               
                    Cost of production inputs as agreed upon by the PCIC and the assured farmer/grower. The farmer may choose to include a portion of the value of the expected yield, but will not exceed 120% of the cost of production inputs. 
                    <br/>
                    <br/>
                  <h6><b> PERIOD OF COVER </b></h6>
                    Shall be for one year for annual, biennial, and perennial crops. For short duration crops which mature in less than one year, the period of cover shall be from planting to harvesting, subject to some stipulations such as the waiting period. There may also be pre-harvest termination of cover for some crops, which is specified in the policy
                  <h6><b> COVERED RISKS </b></h6>
                    Any, all, or a combination of typhoon, flood, drought, earthquake, volcanic eruption, localized strong winds, tornado, frost, hails/ hailstorm, plant diseases, pest infestations and accidental fire; provided that the risk/s covered shall be limited to those specified in the policy contract. Other perils may be covered, but their inclusion is subject to the approval of the PCIC Board of Directors (BOD). 
                    <br/>
                    <br/>
                  <h6><b> ASSIGNMENT OF INSURANCE </b></h6>
                    The assured may assign the policy to any lending institution or other financing conduit with insurable interest on the insured farm/ plantation, subject to PCIC’s concurrence. 
                    <br/>
                    <br/>
                  <h6><b> FARMER/FARMER ORGANIZATION ELIGIBILITY </b></h6>
                    Plantation owners, cooperative farm farmers, corporate farm owners and other planters/ growers with insurable interest on the farm, who grow high-value crops individually or collectively, may qualify.
                    <br/>
                    <br/>
                  <h6><b> REQUIRED DOCUMENTS FOR INDIVIDUAL BORROWING/SELF FINANCED FARMER </b></h6>
                    <ul>
                      <li> Application for High Value Crop Insurance; </li>
                      <li> Parcellary or location map; </li>
                      <li> List of growers (if applicable); and </li>
                      <li> Other documents that may be required by the PCIC. </li>
                    </ul>
                  <h6><b> WHEN TO FILE AN APPLICATION </b></h6>
                    <ul>
                      <li> PCIC Head Office</li>
                      <li> Regional Office (RO) </li>
                      <li> PCIC Extension Office (POE)</li>
                      <li> Service Desk</li>
                      <li> PCIC Accredited Solicitors Agents</li>
                    </ul>
                  <h6><b> NOTICE OF LOSS </b></h6>
                    In the event of loss arising from risks insured against, a Notice of Loss (NL) shall be sent to the PCIC RO or PEO within ten (10) calendar days from the occurrence of loss, and before the scheduled date of harvest
                    <br/>
                    In the case of perils affecting crops and/or fruits of crops which are highly perishable in nature such as blowdown in bananas, strong wind or typhoon-related fruitdropping in mangoes, typhoon and/or flood affecting vegetable crops (e.g., brassicae, bell pepper, etc.), cucumbers and tomato and other solanaceous vegetables, the NL shall be filed within seventy-two (72) hours or three days from the time such perils occurred, or within the prescribed period specified in the policy contract. 

                  <h6><b> CLAIM FOR INDEMNITY </b></h6>   
                    A Claim of Indemnity form shall be filed by the assured farmer/grower with the PCIC RO or PEO within thirty (30) calendar days from the date the loss occurred. 
                    <br/>
                    <br/>
                  <h6><b> CLAIM ADJUSTMENT AND SETTLEMENT </b></h6> 
                    Under a regular insurance claims situation, (wherein a widespread calamity did not occur) claims adjustment and verification shall be conducted, as far as practicable, by two (2) PCIC authorized insurance adjusters. If there is, however, an insufficient number of adjusters, one insurance adjuster may validly conduct the claims adjustment and verification. For group crop insurance, a member of the cooperative shall become a third member of the team of adjusters.
                    <br/>
                    <br/>
                    <ul>
                      <li> Prorated cost of harvested crops;</li>
                      <li> Salvage value, if any ; and </li>
                      <li> Percentage of yield loss. </li>
                    </ul>
                  <h6><b> SETTLEMENT OF CLAIM </b></h6>   
                    Shall be done as quickly as possible, but not later than twenty (20) working days from the receipt of CI.
                    <br/>
                    <br/>
                  <h6><b> NO-CLAIM BENEFIT </b></h6> 
                    The assured is entitled to a no-claim benefit of at least ten percent (10%) of premiums paid for three consecutive crop seasons for short duration crops or during the immediately preceding policy year for annual, biennial, perennial and other seasonal crops grown only once a year.  The benefit can be given as long as the insured crops were not subject of any claim during the mentioned periods. It may also be used to pay for the premium for the next cropping season/year. 
                    <br/>
                    <br/>
                  
                  <b> Amount of Indemnity </b> - shall be based on Actual cost of production inputs already applied at the time of loss per Farm Plan and Budget, subject to limits stipulated in the policy contract; 
                    <ul>
                      <li> Prorated cost of harvested crops; </li>
                      <li> Salvage value, if any; and </li>
                      <li> Percentage of yield loss. </li>
                    </ul>
                    <br/>
                    <br/>
                    Source:<a href="https://pcic.gov.ph/insurance-products-2/"> https://pcic.gov.ph/insurance-products-2/</a>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
      </div>
      <br/>
      <br/>
      <br/>
      <br/> 
  <!-- Non-Agricultural Assets Content -->
  <div class="row" style="padding-top: 20px">
    <div class="col-md-6" >
      <img src="{{ asset('Images/img_assets.png') }}" alt="Non- Agricultural Assets Insurance" class="img-fluid" style="width:600px; height:auto">
    </div>
    <div class="col-md-6 ">
      <h3> Non-Agricultural Assets Insurance  </h3> 
      <br/>
      Agricultural assets shall pertain to buildings, machineries, equipment, transportation facilities, and other related infrastructures directly or indirectly used in pursuit of agricultural activities including production and processing, marketing, storage, and distribution of goods and services.
      <br/>
      <div style="padding-top:20px">
        <center> <a href="#" class="btn btn-success btn-ms mt-1" data-bs-toggle="modal" data-bs-target="#asset"> Read More </a><br /></center> 
      </div>
      <!-- Button trigger modal -->

      <!-- Modal for Rice Crops Insurance, this will allow farmers to view more detailed information about the insurance.-->
      <div class="modal fade" id="asset" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="assetlabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="assetlabel"> Non-Agricultural Asset Insurance</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <img src="{{ asset('Images/img_assets.png') }}" alt="Non-Agricultural Asset Insurance" class="img-fluid" style="width:600px; height:auto">
              <br/>
              <br/>
              <h6> <b> NON-AGRICULTURAL ASSETS </b></h6>
              Agricultural assets shall pertain to buildings, machineries, equipment, transportation facilities, and other related infrastructures directly or indirectly used in pursuit of agricultural activities including production and processing, marketing, storage, and distribution of goods and services.  
              <br>
              <br>
              <h6> <b> TYPES OF INSURANCE COVER AND RISKS ELIGIBLE FOR COVERAGE </b></h6>               
                <ul>
                  <li> Fire and Lightning</li>
                  <li> Warehouse risks for agricultural produce, machineries and equipment; </li>
                  <li> Industrial risks for processing of agricultural prodce</li>
                  <li> Produce houses, pig pens, stables and other similar structures; and</li>
                  <li> Other related infrastructures.</li>
                </ul>
                Note: Allied perils such as typhoon, flood, earthquake, and other perils as rider in fire policy may be included, subject to additional premium loading and approval by PCIC Head Office; if necessary. 
                <br/>
                <br/>
                <b> Property Floater </b>
                Tractors, threshers, trailers, shallow tube wells, other related farm machineries.   
                <b> Commercial Vehicle </b>
                Agricultural transport facilities/vehicles used for hauling agricultural products such as trucks and pickups. 
                Note: Fishery non-crop assets such as ice plants, cold storage and other post-harvest facilities, are eligible for coverage.
                <br/>
                <br/>
              <h6><b> PERIOD OF COVER </b></h6>
                The period of insurance cover shall be for a maximum of one (1) year commencing on the effectivity date or as specified in the policy contract and the payment of premium thereof.   
                <br/>
                <br/>
              <h6><b> PREMIUM RATES, DISCOUNTS AND DEDUCTIBLES </b></h6>
                <b> Fire and Lightning</b>
                Premium rating of all risks, including applicable discounts and deductibles shall be in accordance with the prevailing industry practice.
                <b> Property Floater</b>
                The premium rate shall be based on the prevailing rate in the area; provided, in no case shall said rate be lower than one percent (1.0%) of sum insured if the coverage is an initial insurance coverage for the subject property or the rate as expiring if renewal, subject to a minimum premium of Four Hundred Pesos (P400.00) per policy. The per event deductible shall be one percent (1.0%) of sum insured or One Thousand Pesos (P1,000.00), whichever is higher. 
                <b> Commerchial Vehicle</b>
                The premium rating of all risks shall be in accordance with the prevailing industry practice. The per event deductible shall be One Percent (1.0%) of sum insured or Three Thousand Pesos (P3,000.00), whichever is higher. 
                <br/>
                <br/>
              <h6><b> COVERED RISKS AND PERILS </b></h6>
                <b> Fire and Lightning </b>
                Damage to insured property due to fire and lightning. Property Floater • All risks of direct physical loss or damage to the property insured from any external cause.
                <b> Commercial Vehicle </b>
                Loss of or damage to the scheduled vehicle and its accessories and spare parts whilst thereon: 
                <ul>
                  <li> by accidental collision or overturning consequent upon mechanical breakdown or consequent upon wear and tear; </li>
                  <li> by fire, external explosion, selfignition or lightning or burglary, housekeeping or theft;  </li>
                  <li> List of growers (if applicable); and </li>
                  <li> by malicious act; d. while in transit (including the processes of loading and unloading) incidental to such transit by road, rail, inland waterway, lift or elevator.  </li>
                </ul>
                Other risks specified in the commercial vehicle policy (e.g., CTPL).
                <br>
                <br>
              <h6><b> PROHIBITED RISKS AND PERILS </b></h6>
                <b> Fire and Lightning </b>
                <ul>
                  <li> Non-agriculture related warehouse and industrial risks;  </li>
                  <li> All fire risks not classified under warehouse risks/industrial risks; </li>
                  <li> Earthquake, riot and all allied perils (e.g., typhoon, flood, etc.); </li>
                  <li> Burglary and robbery; </li>
                  <li> All prohibited risks and perils under ordinary fire policy; and • Loss or damage related to war and terrorism. </li>
                </ul>
                <b> Property Floater</b>
                <ul>
                  <li> Loss or damage to the property insured caused by or resulting from wear and tear, gradual deterioration, inherent vice, latent defect, mechanical breakdown, corrosion, rust, dampness of the atmosphere and/or loss or damage caused by perils other than those specified above; </li>
                  <li> Loss or damage to electrical appliances or devices of any kind including wiring caused by electrical current or disturbance whether from artificial or natural cause unless fire ensues and then for the loss by fire only; </li>
                  <li> Loss or damage caused by repairing, adjusting, servicing or maintenance operations, unless fire ensues and then for the loss by fire only; • Infidelity of the assured’s employees or of persons to whom the assured’s property is entrusted; </li>
                  <li> Loss or damage occasioned by the weight of a load exceeding the registered lifting capacity of any machine;  Loss or damage caused directly or indirectly by invasion, the act of foreign enemies, hostilities, warlike operations, (whether war be declared or not) civil war, mutiny, rebellion, revolution, insurrection, military or usurped power or by any direct or indirect consequences of any of the said occurrences; </li>
                </ul>
                Consequential loss or damage of any kind or description whatsoever including:
                <ul>
                  <li> delay in completing, negotiating and loss of contracts and </li>
                  <li> deterioration and loss of market; and  Loss or damage arising from the prohibited risks stipulated in the property floater policy. </li>
                </ul>
                <b> Commercial Vehicle </b>
                <ul>
                  <li> Loss or damage in respect of any claim or series of claims arising out of one event unless such loss or damage is in excess of the deductible and then only for such excess; </li>
                  <li> Consequential loss, depreciation, wear and tear, mechanical or electrical breakdowns, failures or breakages; </li>
                  <li> Damage to tires, unless the Scheduled Vehicle is damaged at the same time;</li>
                  <li> Any malicious damage caused by the assured, any member of his family or by a person in the assured’s service;</li>
                  <li> Loss of, or damage to accessories or spare unless the Scheduled Vehicle is stolen at the same time; and </li>
                  <li> Loss or damage arising from the prohibited perils, exceptions and limitations stipulated in the commercial car policy</li>
                </ul>
              <h6><b> WHEN TO FILE AN APPLICATION </b></h6>
                <ul>
                  <li> PCIC Head Office</li>
                  <li> Regional Office (RO) </li>
                  <li> PCIC Extension Office (POE)</li>
                </ul>
              <h6><b> NOTICE OF LOSS </b></h6>
                In the event of loss, a Notice of Loss (NL) shall be filed to PCIC RO or PEO within ten (10) calendar days after the occurrence of loss. NL shall be in writing and must at least contain the following information: 
                <ul>
                  <li> name and address of the assured; </li>
                  <li> type and number of policy; </li>
                  <li> location of insured property; </li>
                  <li> date and time of occurence of loss;</li>
                  <li> nature/cause of loss; and</li>
                  <li> extend of loss/damage.</li>
                </ul>
              <h6><b> PROOF OF LOSS </b></h6>   
                <ul>
                  <li> Filing of Proof of Loss A proof of loss, signed and sworn to by the assured, shall also be filed with the PCIC RO or PEO. </li>
                  <li> Fire and Lightning Within sixty (60) calendar days after the loss. </li>
                  <li> Property Floater Within ninety (90) calendar days after the loss. </li>
                  <li> Commercial Vehicle Within three (3) calendar days from filing of NL, submit Affidavit of Loss. </li>
                </ul>
              <h6><b> ADJUSTMENT AND SETTLEMENT OF CLAIMS </b></h6> 
                <ul>
                  <li> Adjustment of claim shall be done by PCIC personnel or as the PCIC may deem necessary, such may be assigned to an independent adjuster.</li>
                  <li> A claim shall be settled as expeditiously as possible upon receipt of complete claim documents from the claimant. </li>
                  <li> PCIC shall be liable only to the extent as specified in the policy contract or as agreed upon by and between the assured and the insurer</li>
                </ul>
                <br/>
                <br/>
                Source:<a href="https://pcic.gov.ph/insurance-products-2/"> https://pcic.gov.ph/insurance-products-2/</a>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
  </div>
  <br/>
  <br/>
  <br/>
  <br/> 
</div>

@endsection