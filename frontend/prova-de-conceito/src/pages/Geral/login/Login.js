import React from "react";
import "./styles.css";
export const Login = () => {
    return (
        <>
            <form>
                <div className="container">
                    <label>Email: </label>
                    <input type="text" placeholder="Insira seu e-mail" name="username" required />
                    <label>Senha: </label>
                    <input type="password" placeholder="Insira sua senha" name="password" required />
                    <button type="submit">Login</button>
                </div>
            </form>
        </>
    );
}