import React from "react";
import { Switch, Route, Redirect } from "react-router-dom";
import { Login } from "../pages/Geral/login/Login";


export const Routes = () => {
    return (
        <Switch>
            <Route path="/" exact component={Login} />
            <Redirect from="/login" to="/" />
        </Switch>
    );
};
