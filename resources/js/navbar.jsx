import React from 'react';
import { createRoot } from 'react-dom/client';
import { Fragment } from 'react'
import { Disclosure, Menu, Transition } from '@headlessui/react'
import { Bars3Icon, BellIcon, XMarkIcon } from '@heroicons/react/24/outline'

const navigation = [
  { name: 'Inicio', href: '/', current: false },
  { name: 'Trámites', href: '/tramites', current: false },
  { name: 'FAQ', href: '/faq', current: false },
  { name: 'Mi perfil', href: '/home', current: false },
]

function classNames(...classes) {
  return classes.filter(Boolean).join(' ')
}

export default function Navbar() {
  return (
    <Disclosure as="nav" className="bg-brand-gray">
      {({ open }) => (
        <>
          <div className="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div className="relative flex h-16 items-center justify-between">
              <div className="absolute inset-y-0 left-0 flex items-center sm:hidden">
                {/* Mobile menu button*/}
                <Disclosure.Button className="lg:hidden md:hidden sm:inline-flex xs:inline-flex items-center justify-center rounded-md p-2 text-gray-300 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                  <span className="sr-only">Open main menu</span>
                  {open ? (
                    <XMarkIcon className="block h-6 w-6" aria-hidden="true" />
                  ) : (
                    <Bars3Icon className="block h-6 w-6" aria-hidden="true" />
                  )}
                </Disclosure.Button>
              </div>
              <div className="flex flex-1 items-center sm:items-stretch sm:justify-start">
                <div className="flex flex-shrink-0 items-center">
                  <a href="https://mendozafirm.com"><img className="block h-8 w-auto lg:hidden pr-2 lg:scale-100 md:scale-70 m:scale-50 xs:scale-30" src="https://mendozafirm.com/wp-content/themes/Tema/_assets/public/images/logo.webp" alt="The Mendoza Law Firm logo" /></a>
                  <a href="https://mendozafirm.com"><img className="hidden h-8 w-auto lg:block sm:pr-2 xs:pr-2 sm:pl-4 xs:pl-4 lg:scale-100 md:scale-70 m:scale-50 xs:scale-30" src="https://mendozafirm.com/wp-content/themes/Tema/_assets/public/images/logo.webp" alt="The Mendoza Law Firm logo" /></a>
                </div>
              </div>
              <div className="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <span><a className='text-blanco text-lg font-bold' href="/home">Univision</a></span>
                <span className='text-blanco text-lg mx-4'>|</span>
                <span><a className='text-blanco text-lg font-bold' href="/clientes-inmigracion">Inmigración</a></span>
                <span className='text-blanco text-lg mx-4'>|</span>
                <span><a className='text-blanco text-lg font-bold' href="/clientes-calificados">Clientes Calificados</a></span>
                <span className='text-blanco text-lg mx-4'>|</span>
                <span><a className='text-blanco text-lg font-bold' href="/clientes-dazn">Dazn</a></span>
                {/* Profile dropdown */}
                <Menu as="div" className="relative ml-3">
                  <div>
                    <Menu.Button className="flex rounded-full bg-gray-800 text-sm ring-2 ring-gray-500 hover:outline-none hover:ring-2 hover:ring-white hover:ring-offset-2 hover:ring-offset-gray-800 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                      <span className="sr-only">Open user menu</span>
                      <img className='h-8 w-8 rounded-full' src='/images/users/1693841403.png' alt="logo-profile"/>
                      {/* <img className="h-8 w-8 rounded-full" src='https://mendozafirm.com/wp-content/uploads/2022/04/Mask-Group-1.png' alt=""/> */}
                    </Menu.Button>
                  </div>
                  <Transition
                    as={Fragment}
                    enter="transition ease-out duration-100"
                    enterFrom="transform opacity-0 scale-95"
                    enterTo="transform opacity-100 scale-100"
                    leave="transition ease-in duration-75"
                    leaveFrom="transform opacity-100 scale-100"
                    leaveTo="transform opacity-0 scale-95"
                  >
                    <Menu.Items className="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                      <Menu.Item>
                        {({ active }) => (
                          <a
                            href="/logout"
                            className={classNames(active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700')}
                          >
                            Sign out
                          </a>
                        )}
                      </Menu.Item>
                    </Menu.Items>
                  </Transition>
                </Menu>
              </div>
            </div>
          </div>

          <Disclosure.Panel className="sm:hidden">
            <div className="space-y-1 px-2 pb-3 pt-2 bg-white">
              {navigation.map((item) => (
                <Disclosure.Button
                  key={item.name}
                  as="a"
                  href={item.href}
                  className={classNames(
                    item.current ? 'bg-gray-700 text-black' : 'text-gray-600 hover:bg-gray-100 hover:text-black',
                    'block rounded-md px-3 py-2 text-base font-medium'
                  )}
                  aria-current={item.current ? 'page' : undefined}
                >
                  {item.name}
                </Disclosure.Button>
              ))}
            </div>
          </Disclosure.Panel>
        </>
      )}
    </Disclosure>
  )
}

if(document.getElementById('navbar')){
    createRoot(document.getElementById('navbar')).render(<Navbar/>)
}