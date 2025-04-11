import React from 'react';
import { createRoot } from 'react-dom/client'

export default function Checkout(){
    return(
        <div className='pt-8 mb-8 mx-auto text-center'>
            <div className='sm:px-4 xs:px-4'>
                <h1 className='my-2 uppercase tracking-wider text-6xl font-extrabold font-sans'>Clave</h1>
                <h2 className='uppercase text-red-600 text-3xl tracking-wider font-sans font-semibold'>Título</h2>
                <div className='mx-8 md:mx-16 lg:mx-80 pb-4'>   
                    <p className='my-8'><i>Instrucciones:</i>&nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, ullam iure dignissimos voluptatibus a ex. Tempore, eos tenetur repudiandae natus molestias asperiores in rem ullam, provident, magnam fugit doloribus eligendi.</p>
                </div>
                <div className='grid md:grid-flow-row sm:grid-flow-row xs:grid-flow-row lg:grid-cols-2 lg:gap-x-4 content-center justify-center'>
                    <div className='items-center justify-center md:pb-8 sm:pb-8 xs:pb-8 lg:justify-self-end'>
                    <p className='uppercase text-gray-800 tracking-wider text-md text-center font-extrabold pb-8 font-sans'>¿Cómo realizar tu pago vía LawPay?</p>
                        <video autoplay loop muted class="z-10 aspcect-auto max-w-md rounded-lg mx-auto">
                            <source src="https://assets.mixkit.co/videos/preview/mixkit-set-of-plateaus-seen-from-the-heights-in-a-sunset-26070-large.mp4" type="video/mp4"/>
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div className='bg-brand-green rounded-lg mx-8 lg:mx-16 md:mx-8 sm:mx-8 lg:justify-self-start'>
                        <h3 className='uppercase text-center text-white tracking-wide text-xl pt-8'>Formulario de pago</h3>
                        <ul class="mb-16 mt-6 mx-8 lg:mx-16 md:mx-16 text-left">
                            <li className='py-2 w-auto'>
                                <label class="block">
                                    <span class="uppercase after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-white">
                                        Nombre
                                    </span>
                                    <input type="fullname" name="fullname" id="userFullname" class="text-slate-600 mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-500 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-full sm:text-sm focus:ring-1" placeholder="John Doe" />
                                </label>
                            </li>
                            <li className='py-2 w-auto'>
                                <label class="block">
                                    <span class="uppercase after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-white">
                                        País de origen
                                    </span>
                                    <input type="text" name="email" id="userEmail" class="text-slate-600 mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-500 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-full sm:text-sm focus:ring-1" placeholder="you@example.com" />
                                </label>
                            </li>
                            <li className='py-2 w-auto'>
                                <label class="block">
                                    <span class="uppercase after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-white">
                                        Fecha de Nacimiento
                                    </span>
                                    <input type="date" name="birthdate" id="userBirthdate" class="text-slate-600 mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-500 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-full sm:text-sm focus:ring-1" placeholder="dd/mm/aaaa" />
                                </label>
                            </li>
                            <li className='py-2 w-auto'>
                                <label class="block">
                                    <span class="uppercase after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-white">
                                        Fecha de Nacimiento
                                    </span>
                                    <input type="date" name="birthdate" id="userBirthdate" class="text-slate-600 mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-500 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-full sm:text-sm focus:ring-1" placeholder="dd/mm/aaaa" />
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="text-center py-8 grid grid-cols-2 gap-x-2.5">
                    <a href="/documentos" class="xs:px-4 sm:px-6 md:px-6 lg:px-12 text-xs lg:text-sm md:text-sm drop-shadow w-fit m-auto hero-button border-2 border-solid border-white transition rounded-full bg-red-600 py-2.5 font-extrabold text-white shadow-sm hover:bg-red-800 hover:font-extrabold focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 uppercase hover:scale-110"><span className="fa fa-arrow-left"></span>&nbsp;&nbsp;Volver</a>
                    <a href="/invoice" class="xs:px-4 sm:px-6 md:px-6 lg:px-12 text-xs lg:text-sm md:text-sm drop-shadow w-fit m-auto hero-button border-2 border-solid border-white transition rounded-full bg-red-600 py-2.5 font-extrabold text-white shadow-sm hover:bg-red-800 hover:font-extrabold focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 uppercase hover:scale-110">Continuar&nbsp;&nbsp;<span className="fa fa-arrow-right"></span></a>
                </div>
            </div>
        </div>
    );
}

if(document.getElementById('checkout')){
    createRoot(document.getElementById('checkout')).render(<Checkout />)
}