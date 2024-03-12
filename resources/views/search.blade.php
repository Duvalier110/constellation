

<!-- Booking Start -->
<form class="/room">
    @csrf
<div class="container-fluid booking pb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <div class="bg-white shadow" style="padding: 35px;">
            <div class="row g-2">
                <div class="col-md-10">
                    <div class="row g-2">
                        <div class="col-md-6">
                            <select name="adulte" class="form-select">
                                <option selected>Adulte</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select name="enfant" class="form-select">
                                <option >Enfant</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                       
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Recherche</button>
                </div>
            </div>
        </div>
    </div>
</form>