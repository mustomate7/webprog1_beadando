
<div class="container text-center">
  <div class="row align-items-start">

<h1 class="display-3">Felhasználói fiók</h1>
    
        
        <div class="col-md-6">  
          <form action = "?oldal=belep" method = "post">
            <fieldset>
              <legend>Bejlentkezés</legend>
              <br>
              <input type="text" name="felhasznalo" placeholder="felhasználó" required><br><br>
              <input type="password" name="jelszo" placeholder="jelszó" required><br><br>
              <input type="submit" name="belepes" value="Belépés">
              <br>&nbsp;
            </fieldset>
          </form>
        </div>

        
    
        <div class="col-md-6"> 
          <form action = "?oldal=regisztral" method = "post">
            <fieldset>
              <legend>Regisztráció</legend>
              <br>
              <input type="text" name="vezeteknev" placeholder="vezetéknév" required><br><br>
              <input type="text" name="utonev" placeholder="utónév" required><br><br>
              <input type="text" name="felhasznalo" placeholder="felhasználói név" required><br><br>
              <input type="password" name="jelszo" placeholder="jelszó" required><br><br>
              <input type="submit" name="regisztracio" value="Regisztráció">
              <br>&nbsp;
            </fieldset>
          </form>
        </div>

  </div>
  </div>
