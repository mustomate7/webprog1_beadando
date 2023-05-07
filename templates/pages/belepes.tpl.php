
<div class="container text-center">
  <div class="row align-items-start">

<h1 class="display-3 mb-4">Felhasználói fiók</h1>
    
        
        <div class="col-md-6">  
          <form action = "?oldal=belep" method = "post" class="col-4 mx-auto">
            <fieldset>
              <legend>Bejelentkezés</legend>
              <br>
              <input type="text" name="felhasznalo" placeholder="felhasználó" required class="form-control mb-3">
              <input type="password" name="jelszo" placeholder="jelszó" required class="form-control mb-3">
              <input type="submit" name="belepes" value="Belépés" class="btn btn-primary">
              <br>&nbsp;
            </fieldset>
          </form>
        </div>

        
    
        <div class="col-md-6"> 
          <form action = "?oldal=regisztral" method = "post" class="col-4 mx-auto">
            <fieldset>
              <legend>Regisztráció</legend>
              <br>
              <input type="text" name="vezeteknev" placeholder="vezetéknév" required class="form-control mb-3">
              <input type="text" name="utonev" placeholder="utónév" required class="form-control mb-3">
              <input type="text" name="felhasznalo" placeholder="felhasználói név" required class="form-control mb-3">
              <input type="password" name="jelszo" placeholder="jelszó" required class="form-control mb-3">
              <input type="submit" name="regisztracio" value="Regisztráció" class="btn btn-secondary">
              <br>&nbsp;
            </fieldset>
          </form>
        </div>

  </div>
  </div>
