<div class="container" style="margin-top: 70px;">
    <div class="row">
        <div class="col-xm-12 col-sm-6" style="padding-top: 20px;">
            <form>
                <div class="form-group forma">
                    <p style="font-size: 27px; border-bottom: 3px solid #5383d3" >Pošaljite mail adminstratoru:</p>
                </div>
                <div class="form-group">
                    <label class="forma" for="username">Naslov</label>
                    <input type="text" class="form-control" id="naslovPoruke">
                    <label id="naslovGreska">Samo slova brojevi i razmaci</label>
                </div>
                <div class="form-group">
                    <label class="forma" for="username">Poruka</label>
                    <textarea id="sadrzajPoruke" class="form-control" style="min-height: 250px;"></textarea>
                    <label id="tekstGreska">Samo slova brojevi i razmaci</label>
                </div>
                <input type="hidden" id="emailKor" value="<?= $_SESSION['korisnik']->email ?>" >
                <button id="porukaAdminu" type="button" class="btn btn-warning">Pošalji</button>
            </form>
            <div id="porukaAdm">

            </div>
        </div>
        <div class="col-xm-12 col-sm-6" style="padding-top: 20px;">
            <img class="img-responsive img-rounded center-block" src="slike/autor.jpg" alt="autor"/>
            <p style="padding-top: 15px; padding-left: 40px; padding-right: 40px;" class="text-center">
                Pozdrav, zovem se Filip Amanović trenutno student
                <span><a href="https://www.ict.edu.rs" target="_blank">Visoke ICT</a></span> škole u Beogradu smer web
                programiranje. Završio sam srednju školu etš "Nikola Tesla". U slobodno vreme bavim se
                sportom: plivanje, tenis, fudbal..<br>
                Kontakt mail: filip.amanovic.136.16@ict.edu.rs
            </p>

        </div>
    </div>
</div>