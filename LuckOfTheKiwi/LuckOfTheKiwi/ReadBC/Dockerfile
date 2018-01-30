FROM golang:1.9-alpine as builder
RUN apk add --no-cache make gcc musl-dev linux-headers
ADD . /go-ethereum
RUN cd /go-ethereum && make geth

FROM alpine:latest
RUN apk add --no-cache ca-certificates
COPY --from=builder /go-ethereum/build/bin/geth/ /usr/local/bin
EXPOSE 8545 8546 30303/udp 30304/udp
ENTRYPOINT [ "geth" ]