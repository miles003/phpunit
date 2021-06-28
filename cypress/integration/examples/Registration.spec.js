/// <reference types="cypress" />

context('Actions', () => {
  beforeEach(() => {
    cy.visit('/register')
  })

  // https://on.cypress.io/interacting-with-elements

  it('.type() - type into a DOM element', () => {
    // https://on.cypress.io/type
    cy.get('#name')
      .type('Miles Selim').should('have.value', 'Miles Selim')
    cy.get('#email')
      .type('miles@email.com').should('have.value', 'miles@email.com')
    cy.get('#password')
      .type('password').should('have.value', 'password')
    cy.get('#password_confirmation')
      .type('password').should('have.value', 'password')
    cy.get('form').submit()
    cy.get('.profile-dropdown').click()
    cy.get('.form-logout button').click()
    cy.get('#email').type('miles@email.com').should('have.value','miles@email.com')
    cy.get('#password')
    .type('password').should('have.value', 'password')
    cy.get('form').submit()
  })
})
