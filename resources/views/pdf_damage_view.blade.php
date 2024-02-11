<html>
    <head>
    </head>
    <body>
      <div class="row d-flex justify-content-center">
        <table style="width:100%">
        <tr padding="0px">
          <td style="width:5%"></td>
          <td> <img src="{{ asset('images/img_tanauan.png') }}" style=" width:180px; height:auto;" /> </td>
          <td>
            <p style="text-center">
            City of Agriculturist<br />
            New City Hall Building, Laurel Hill, Natatas,<br />
            Tanauan City, Batangas<br />
            Region IV- A (CALABARZON)
           </p>
          </td>
          <td style="width:5%"></td>
          <td><img src="{{ asset('images/firms.png') }}" style="width:180px; height:auto;"/></td>
        </tr>                  
        </table>
      </div>
      <div class="row">
        <h4> Notice of Loss </h4>
        <div class="col-md-12">
          <div class="table-wrapper" style=" width:100%;">
            <table class="table table-bordered table-striped mb-5">
              <thead>
                <th>Notice of Loss ID</th>
                <th>Farmer's ID</th>
                <th>Farmer's Name</th>
                <th>Barangay</th>
                <th>Insurance ID</th>
                <th>Crops</th>
                <th>Insurance Type</th>
                <th>Area Insured</th>
                <th>CIC Number</th>
                <th>Damage Cause</th>
                <th>Date of Loss</th>
                <th>Harvest Date</th>
                <th>Farm Location</th>
                <th>Date Submitted</th>
              </thead>
              <tbody>
                    @foreach ($damages as $damage)
                    <tr>
                      <td>{{$damage->id}} </td>
                      <td>{{$damage->farmersID}} </td>
                      <td>{{$damage->firstName}} {{$damage->middleName}} {{$damage->lastName}} {{$damage->extensionName}}</td>
                      <td>{{$damage->barangayAddress}} </td>
                      <td>{{$damage->cropInsuranceID}}} </td>
                      <td>{{$damage->cropName}}</td>
                      <td>{{$damage->insuranceType}}</td>
                      <td>{{$damage->areaInsured}}</td>
                      <td>{{$damage->cicNumber}}</td>
                      <td>{{$damage->damageCause}} </td>
                      <td>{{$damage->dateLoss}}</td>
                      <td>{{$damage->dateHarvest}}</td>
                      <td>{{$damage->barangayFarm}}</td>
                      <td>{{$damage->dateSubmitted}}</td>
                    </tr>
                    @endforeach
              </tbody>
            </table>
        </div>
        </div>
      </div>
        </body>
</html>