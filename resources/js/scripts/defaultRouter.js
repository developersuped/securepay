module.exports.routers = [
    {path: "/find/:text", component: {template: "<finditem ref='finditem'/>"}},
    {path: "/detalle_cliente", component: {template: "<detalle_cliente ref='detalle_cliente'/>"}},
    {path: "**", component: {template: "<notfund ref='notfund'/>"}}
];
