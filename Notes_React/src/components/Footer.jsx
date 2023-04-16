import React from "react";

function Footer() {
  const year = new Date().getFullYear();
  return (
    <footer>
      <p>Mi Vida Fácil ⓒ {year}</p>
    </footer>
  );
}

export default Footer;