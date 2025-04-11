import React from 'react';
import { createRoot } from 'react-dom/client'

export default function Footer(){
    return(
        <footer class="bg-brand-gray">
           <div class="container grid grid-cols-[2fr,1fr] gap-24 md:flex md:flex-col-reverse md:gap-12">
                <div class="text-smoke">
                    <p class="text-smokedarker text-white mb-2">© 2023 The Mendoza Law Firm.</p>
                    <p class="font-bold mb-8">
                        <a class="text-white" href="/terms-and-conditions/">Terms and Conditions</a>
                        <span class="text-red">|</span>
                        <a class="text-white" href="/privacy-policy/">Privacy Policy</a>
                        <span class="text-red">|</span>
                        <a class="text-white" href="/sitemap/">Sitemap</a>
                    </p>
                </div>
            </div>
            <div class="container grid md:flex md:flex-col-reverse text-white">
                <p class="footer-disclaimer"><b>Descargo de responsabilidad:</b> <br/>La información contenida en esta URL concierne exclusivamente a casos de violación de privacidad. Cada caso requiere de una evaluación para determinar elegibilidad. Pre-calificar no necesariamente implica ser elegible para una compensación. Los datos en este sitio web son compartidos con fin informativo y no deben ser considerados consejo legal.</p>                   
            </div>
        </footer>
    );
}
/****M4r142023M3ND0Z4  maria@mendozafirm.com */
if(document.getElementById('footer')){
    createRoot(document.getElementById('footer')).render(<Footer/>)
}